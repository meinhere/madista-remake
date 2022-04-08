<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
  protected $table = 'artikel';
  protected $useTimestamps = true;
  protected $allowedFields = ['nisn_auth', 'slug', 'judul', 'deskripsi', 'konten_artikel', 'thumbnail', 'status'];


  public function getArtikel($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }

    return $this->where('slug', $slug)->first();
  }
}
