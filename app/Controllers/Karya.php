<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\I18n\Time;
use App\Models\SiswaModel;
use App\Models\MadigModel;

class Karya extends BaseController
{
    protected $siswaModel;
    protected $madigModel;
    protected $nisn;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->madigModel = new MadigModel();
        $this->nisn = session()->get('auth');
    }

    public function create()
    {
        if (!session()->get('auth')) {
            return redirect()->to(base_url('/auth/login'));
        }

        $data = [
            'title' => 'Madista | Tambah Karya',
            'request' => \Config\Services::request(),
            'siswa' => $this->siswaModel->getSiswa($this->nisn),
            'validation' => \Config\Services::validation()
        ];

        return view('/siswa/karya/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih status karya yang akan diupload'
                ]
            ],
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar karya belum diisi',
                    'max_size' => 'Ukuran gambar terlalu besar (Max: 1MB)',
                    'is_image' => 'Ekstensi tidak valid',
                    'mime_in' => 'Ekstensi tidak valid (.jpg, .jpeg, .png)'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/karya/create'))->withInput();
        }

        $image = $this->request->getFile('image');
        $newImageName = $image->getRandomName();
        $image->move('img/madig', $newImageName);

        $this->madigModel->save([
            'nisn_auth' => session()->get('auth'),
            'image' => $newImageName,
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('success', 'Satu karya baru berhasil diupload');
        return redirect()->to(base_url('/siswa/upload'));
    }

    public function edit($id)
    {
        if (!session()->get('auth')) {
            return redirect()->to(base_url('/auth/login'));
        }

        $data = [
            'title' => 'Madista | Dashboard',
            'request' => \Config\Services::request(),
            'siswa' => $this->siswaModel->getSiswa($this->nisn),
            'madig' => $this->madigModel->find($id),
            'validation' => \Config\Services::validation()
        ];

        return view('/siswa/karya/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih status karya yang akan diupload'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/karya/edit/' . $id))->withInput();
        }

        $madig = $this->madigModel->find($id);
        if (!empty($this->request->getFile('image')->getName())) {
            $image = $this->request->getFile('image');
            $newImageName = $image->getRandomName();
            $image->move('img/madig', $newImageName);

            unlink('img/madig/' . $madig['image']);
        } else {
            $newImageName = $madig['image'];
        }

        $this->madigModel->save([
            'id' => $id,
            'nisn_auth' => session()->get('auth'),
            'image' => $newImageName,
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('success', 'Karya berhasil diubah');
        return redirect()->to(base_url('/siswa/upload'));
    }


    public function delete($id)
    {
        $madig = $this->madigModel->find($id);

        unlink('img/madig/' . $madig['image']);
        $this->madigModel->delete($id);

        session()->setFlashdata('success', 'Satu karya berhasil dihapus');
        return redirect()->to(base_url('/siswa/upload'));
    }
}
