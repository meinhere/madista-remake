<?php

namespace App\Models;

use CodeIgniter\Model;

class MadigModel extends Model
{
  protected $table = 'madig';
  protected $useTimestamps = true;
  protected $allowedFields = ['nisn_auth', 'image', 'keterangan', 'status'];
}
