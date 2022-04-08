<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class MadigSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $data = [
      [
        'nisn_auth' => '123456789',
        'image' => '1648965264_860f957f7a21728a4649.jpg',
        'status' => 'publish',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nisn_auth' => '123456789',
        'image' => '1649048155_13ed68eebd6d8bc42ea0.jpg',
        'status' => 'publish',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nisn_auth' => '123456789',
        'image' => '1622016644_c821b605ff994409e190.jpg',
        'status' => 'draf',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nisn_auth' => '123456789',
        'image' => '1622021361_9b3e8595d77245f28f78.jpeg',
        'status' => 'publish',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nisn_auth' => '12345678',
        'image' => '1649078671_1d796f0e1223672ea7e6.jpg',
        'status' => 'publish',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nisn_auth' => '12345678',
        'image' => '1649078730_424d02aa55a19b77a75a.png',
        'status' => 'publish',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nisn_auth' => '12345678',
        'image' => '1649078745_7ac40b60ba93675c14b0.jpg',
        'status' => 'draf',
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
    $this->db->table('madig')->insertBatch($data);
  }
}
