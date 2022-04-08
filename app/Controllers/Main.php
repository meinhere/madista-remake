<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\MadigModel;

class Main extends BaseController
{
  protected $artikelModel;
  protected $madigModel;

  public function __construct()
  {
    $this->artikelModel = new ArtikelModel();
    $this->madigModel = new MadigModel();
    $this->language = \Config\Services::language();
    $this->language->setLocale('id');
  }

  public function index()
  {
    $data = [
      'title' => 'Madista | Beranda',
      'request' => \Config\Services::request(),
      'artikel' => $this->artikelModel->where('status', 'publish')->findAll(),
      'madig' => $this->madigModel->where('status', 'publish')->paginate(3, 'madig'),
      'pager' => $this->madigModel->pager
    ];
    return view('main/index', $data);
  }

  public function profile()
  {
    $data = [
      'title' => 'Madista | Profile Sekolah',
      'request' => \Config\Services::request(),
    ];
    return view('main/profile', $data);
  }

  public function madig()
  {
    $data = [
      'title' => 'Madista | Madig 3D',
      'request' => \Config\Services::request(),
    ];

    return view('main/madig', $data);
  }

  public function showMadig()
  {
    $data = [
      'title' => 'Madista | Madig 3D',
      'request' => \Config\Services::request(),
    ];
    return view('main/panorama/madig3d', $data);
  }

  public function streetView()
  {
    $data = [
      'title' => 'Madista | Street View',
      'request' => \Config\Services::request(),
    ];
    return view('main/panorama/streetview', $data);
  }
}
