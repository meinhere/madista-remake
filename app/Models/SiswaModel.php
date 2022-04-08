<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
  protected $table = 'siswa';
  protected $useTimestamps = true;
  protected $allowedFields = ['nisn', 'nama', 'kelas', 'img_profile'];

  public function getSiswa($nisn = false)
  {
    if ($nisn == false) {
      return $this->findAll();
    }

    return $this->where('nisn', $nisn)->first();
  }
}
