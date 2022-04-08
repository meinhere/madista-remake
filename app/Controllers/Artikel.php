<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\SiswaModel;

class Artikel extends BaseController
{
  protected $artikelModel;
  protected $siswaModel;

  public function __construct()
  {
    $this->artikelModel = new ArtikelModel();
    $this->siswaModel = new SiswaModel();
    $this->nisn = session()->get('auth');

    $this->language = \Config\Services::language();
    $this->language->setLocale('id');
  }

  public function index()
  {
    $artikel = $this->artikelModel->where('status', 'publish')->findAll();
    foreach ($artikel as $item) {
      $author = $this->siswaModel->where('nisn', $item['nisn_auth'])->first();
    }

    $data = [
      'title' => 'Madista | Artikel',
      'artikel' => $artikel,
      'author' => $author,
      'request' => \Config\Services::request()
    ];
    return view('main/artikel/index', $data);
  }

  public function detail($slug)
  {
    $artikel = $this->artikelModel->getArtikel($slug);
    $data = [
      'title' => 'Madista | ' . $artikel['judul'],
      'request' => \Config\Services::request(),
      'artikel' => $artikel,
    ];

    if (empty($artikel)) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel " . $slug . ' tidak ditemukan');
    }

    return view('main/artikel/detail', $data);
  }

  public function create()
  {
    if (!session()->get('auth')) {
      return redirect()->to(base_url('/auth/login'));
    }

    $data = [
      'title' => 'Madista | Tambah Artikel',
      'request' => \Config\Services::request(),
      'siswa' => $this->siswaModel->where('nisn', $this->nisn)->first(),
      'validation' => \Config\Services::validation()
    ];

    return view('siswa/artikel/create', $data);
  }

  public function save()
  {
    if (!$this->validate([
      'judul' => [
        'rules' => 'required|is_unique[artikel.judul]',
        'errors' => [
          'required' => 'Judul artikel harus diisi',
          'is_unique' => 'Judul sudah ada, silahkan ganti yang lain'
        ]
      ],
      'deskripsi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Deskripsi artikel harus diisi'
        ]
      ]
    ])) {
      return redirect()->to(base_url('/artikel/create'))->withInput();
    }

    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->artikelModel->save([
      'nisn_auth' => $this->nisn,
      'slug' => $slug,
      'judul' => $this->request->getVar('judul'),
      'deskripsi' => mb_strcut($this->request->getVar('deskripsi'), 0, 200) . '...',
      'konten_artikel' => '<h1>' . $this->request->getVar('judul') . '<h1>',
      'status' => 'draf'
    ]);

    return redirect()->to(base_url('/artikel/manage/' . $slug));
  }

  public function manage($slug)
  {
    if (!session()->get('auth')) {
      return redirect()->to(base_url('/auth/login'));
    }

    $data = [
      'title' => 'Madista | Edit Artikel',
      'request' => \Config\Services::request(),
      'siswa' => $this->siswaModel->where('nisn', $this->nisn)->first(),
      'artikel' => $this->artikelModel->getArtikel($slug)
    ];

    return view('siswa/artikel/manage', $data);
  }

  public function update($id)
  {
    $this->artikelModel->save([
      'id' => $id,
      'konten_artikel' => $this->request->getVar('konten_artikel'),
    ]);

    return redirect()->to(base_url('/artikel/manage/' . $this->request->getVar('slug')));
  }

  public function finish($slug)
  {
    if (!session()->get('auth')) {
      return redirect()->to(base_url('/auth/login'));
    }

    $data = [
      'title' => 'Madista | Finished Artikel',
      'request' => \Config\Services::request(),
      'siswa' => $this->siswaModel->where('nisn', $this->nisn)->first(),
      'artikel' => $this->artikelModel->getArtikel($slug),
      'validation' => \Config\Services::validation()
    ];

    return view('siswa/artikel/finish', $data);
  }

  public function attempt($id)
  {
    $status = $this->request->getVar('status');
    $slug = url_title($this->request->getVar('judul'), '-', true);

    // Rule judul artikel
    if ($slug == $this->request->getVar('slugLama')) {
      $judulRule = 'required';
      $errorJudul = [
        'required' => 'Judul artikel harus diisi',
      ];
    } else {
      $judulRule = 'required|is_unique[artikel.judul]';
      $errorJudul = [
        'required' => 'Judul artikel harus diisi',
        'is_unique' => 'Judul sudah ada, silahkan ganti yang lain'
      ];
    }

    // Rule gambar thumbnail
    if ($status == 'publish') {
      $thumbnailRule = 'max_size[thumbnail,1024]|is_image[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]';
      $errorThumbnail = [
        'max_size' => 'Ukuran gambar terlalu besar (Max: 1MB)',
        'is_image' => 'Ekstensi tidak valid',
        'mime_in' => 'Ekstensi tidak valid (.jpg, .jpeg, .png)',
      ];
    } else {
      $thumbnailRule = 'uploaded[thumbnail]|max_size[thumbnail,1024]|is_image[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]';
      $errorThumbnail = [
        'max_size' => 'Ukuran gambar terlalu besar (Max: 1MB)',
        'is_image' => 'Ekstensi tidak valid',
        'mime_in' => 'Ekstensi tidak valid (.jpg, .jpeg, .png)',
        'uploaded' => 'Gambar karya belum diisi'
      ];
    }

    // Validasi request
    if (!$this->validate([
      'judul' => [
        'rules' => $judulRule,
        'errors' => $errorJudul
      ],
      'deskripsi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Deskripsi artikel harus diisi'
        ]
      ],
      'thumbnail' => [
        'rules' => $thumbnailRule,
        'errors' => $errorThumbnail
      ],
    ])) {
      return redirect()->to(base_url('/artikel/finish/' . $this->request->getVar('slugLama')))->withInput();
    }

    // Cek apakah  status artikel publish atau draf
    if ($status == 'publish') {
      if (!$this->request->getFile('thumbnail')->getName()) {
        $newImageName = $this->request->getVar('thumbLama');
      } else {
        $image = $this->request->getFile('thumbnail');
        $newImageName = $image->getRandomName();
        $image->move('img/thumbnail', $newImageName);
        unlink('img/thumbnail/' . $this->request->getVar('thumbLama'));
      }
    } else {
      $image = $this->request->getFile('thumbnail');
      $newImageName = $image->getRandomName();
      $image->move('img/thumbnail', $newImageName);
    }

    $this->artikelModel->save([
      'id' => $id,
      'slug' => $slug,
      'judul' => $this->request->getVar('judul'),
      'deskripsi' => mb_strcut($this->request->getVar('deskripsi'), 0, 200) . '...',
      'thumbnail' => $newImageName,
      'status' => 'publish'
    ]);

    session()->setFlashdata('success', 'Artikel berhasil diupdate');
    return redirect()->to(base_url('/siswa/artikel'));
  }

  public function delete($id)
  {
    $this->artikelModel->delete($id);

    session()->setFlashdata('success', 'Artikel berhasil dihapus');
    return redirect()->to(base_url('/siswa/artikel'));
  }
}
