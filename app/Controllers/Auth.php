<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Auth extends BaseController
{
  protected $siswa;

  public function __construct()
  {
    $this->siswa = new SiswaModel();
  }

  public function login()
  {
    $data = [
      'title' => 'Madista | Halaman Login',
      'request' => \Config\Services::request(),
      'path' => base_url(),
      'validation' => \Config\Services::validation()
    ];
    return view('auth/login', $data);
  }

  public function authenticate()
  {
    $nisn = $this->request->getPost('nisn');
    $siswa = $this->siswa->where('nisn', $nisn)->first();

    if (empty($nisn)) {
      session()->setFlashdata('error', 'Harap masukkan NISN');
      return redirect()->to(base_url('/auth/login'));
    }
    if (empty($siswa)) {
      session()->setFlashdata('error', 'NISN tidak dikenali');
      return redirect()->to(base_url('/auth/login'))->withInput();
    }

    session()->set('auth', $siswa['nisn']);
    return redirect()->to(base_url('/siswa'));
  }

  public function logout()
  {
    session()->destroy();

    return redirect()->to(base_url('/'));
  }
}
