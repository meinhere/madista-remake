<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class SiswaSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $data = [
      [
        'nisn' => '123456789',
        'nama' => 'Administrator',
        'kelas' => 'Development',
        'img_profile' => 'boy.jpg',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nisn' => '12345678',
        'nama' => 'User',
        'kelas' => 'Client',
        'img_profile' => 'girl.png',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
    ];

    // Simple Queries
    // $this->db->query(
    //   "INSERT INTO artikel VALUES(:nisn_auth:, :slug:, :judul:, :deskripsi:, :konten_artikel:, :thumbnail:, :status:, :created_at:, :updated_at:)",
    //   $data
    // );

    // Using Query Builder
    $this->db->table('siswa')->insertBatch($data);
  }
}
