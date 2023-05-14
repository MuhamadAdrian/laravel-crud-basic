<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mahasiswaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            'nim_mhs' => 10000,
            'nama_mhs' => 'Andung',
            'ttl_mhs' => 'Meunafa 05 10 2006',
            'alamat' => 'Meunafa',
            'telpon_mhs' => '08928398923',
            'email_mhs' => 'andung@gmail.com',
            'kota_mhs' => 'Sinabung',
            'agama_mhs' => 'Islam',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('mahasiswa')->insert([
            'nim_mhs' => 20000,
            'nama_mhs' => 'Maman',
            'ttl_mhs' => 'Japan 05 10 2006',
            'alamat' => 'Japan',
            'telpon_mhs' => '082908398384',
            'email_mhs' => 'maman@gmail.com',
            'kota_mhs' => 'Tokyo',
            'agama_mhs' => 'Islam',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('mahasiswa')->insert([
            'nim_mhs' => 30000,
            'nama_mhs' => 'Ineu',
            'ttl_mhs' => 'Tasik 05 10 2006',
            'alamat' => 'Tasik',
            'telpon_mhs' => '08238928392',
            'email_mhs' => 'ineu@gmail.com',
            'kota_mhs' => 'Tasik',
            'agama_mhs' => 'Islam',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
