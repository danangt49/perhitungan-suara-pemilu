<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'alamat_tinggal' => 'Jl. Raya Janti Karang Jambe no 143, Yogyakarta, D.I.Y, 55198',
            'no_ktp' => "333008202191910",
            'no_hp' => "082932082920",
            'password' => bcrypt('secret'),
            'pendidikan' => 'SMA/SMK',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Pria',
            'role' => 'admin'
        ]);

        User::create([
            'id' => 2,
            'nama' => 'Erni',
            'email' => 'erni@gmail.com',
            'alamat_tinggal' => 'Jl. Raya Janti Karang Jambe no 143, Yogyakarta, D.I.Y, 55198',
            'no_ktp' => "3330082021919110",
            'no_hp' => "0829320821920",
            'password' => bcrypt('secret'),
            'pendidikan' => 'SMA/SMK',
            'agama' => 'Islam',
            'jenis_kelamin' => 'Perempuan',
            'role' => 'owner',
            'partai' => 'Partai Perduli Perempuan',
            'dapil' => '6',
            'wilayah' => 'Sleman',
        ]);
    }
}
