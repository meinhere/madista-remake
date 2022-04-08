<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\MadigModel;
use App\Models\ArtikelModel;

class Siswa extends BaseController
{
  protected $siswaModel;
  protected $madigModel;
  protected $artikelModel;
  protected $nisn;

  public function __construct()
  {
    $this->siswaModel = new SiswaModel();
    $this->madigModel = new MadigModel();
    $this->artikelModel = new ArtikelModel();
    $this->nisn = session()->get('auth');

    $this->language = \Config\Services::language();
    $this->language->setLocale('id');
  }

  public function index()
  {
    if (!session()->get('auth')) {
      return redirect()->to(base_url('/auth/login'));
    }

    $data = [
      'title' => 'Madista | Dashboard',
      'request' => \Config\Services::request(),
      'siswa' => $this->siswaModel->getSiswa($this->nisn)
    ];

    return view('/siswa/index', $data);
  }


  public function upload()
  {
    if (!session()->get('auth')) {
      return redirect()->to(base_url('/auth/login'));
    }

    $data = [
      'title' => 'Madista | Upload Karya',
      'request' => \Config\Services::request(),
      'siswa' => $this->siswaModel->getSiswa($this->nisn),
      'madig' => $this->madigModel->where('nisn_auth', $this->nisn)->findAll()
    ];

    return view('/siswa/upload', $data);
  }

  public function artikel()
  {
    if (!session()->get('auth')) {
      return redirect()->to(base_url('/auth/login'));
    }

    $data = [
      'title' => 'Madista | List Artikel',
      'request' => \Config\Services::request(),
      'siswa' => $this->siswaModel->getSiswa($this->nisn),
      'draf' => $this->artikelModel->where(['nisn_auth' => $this->nisn, 'status' => 'draf'])->findAll(),
      'publish' => $this->artikelModel->where(['nisn_auth' => $this->nisn, 'status' => 'publish'])->findAll()
    ];

    return view('/siswa/artikel', $data);
  }

  public function profile()
  {
    if (!session()->get('auth')) {
      return redirect()->to(base_url('/auth/login'));
    }

    $data = [
      'title' => 'Madista | Profil Siswa',
      'request' => \Config\Services::request(),
      'siswa' => $this->siswaModel->getSiswa($this->nisn),
    ];

    return view('/siswa/profile', $data);
  }

  public function edit()
  {
    if (!session()->get('auth')) {
      return redirect()->to(base_url('/auth/login'));
    }

    $data = [
      'title' => 'Madista | Edit Profil',
      'request' => \Config\Services::request(),
      'siswa' => $this->siswaModel->getSiswa($this->nisn),
    ];

    return view('/siswa/edit-profile', $data);
  }

  public function update($id)
  {
    $this->siswaModel->save([
      'id' => $id,
      'nama' => $this->request->getVar('nama'),
      'kelas' => $this->request->getVar('kelas')
    ]);

    session()->setFlashdata('success', 'Profil berhasil diubah');
    return redirect()->to(base_url('/siswa/profile'));
  }
}
