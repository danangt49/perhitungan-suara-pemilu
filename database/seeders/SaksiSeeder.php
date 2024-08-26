<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Priantanu', 'email' => 'priantanu@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Jambon RT 2 RW 21, Trihanggo, Gamping, Sleman, DIY', 'no_ktp' => '3404012411960004', 'no_hp' => '081234567810', 'password' => Hash::make('password'), 'kode_tps' => '48488001', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Rusli', 'email' => 'rusli@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Mranggen Kidul RT 6 RW 27, Sinduadi, Mlati, Sleman, DIY', 'no_ktp' => '3471010903960001', 'no_hp' => '0812345678912', 'password' => Hash::make('password'), 'kode_tps' => '48488020', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Ardiyana', 'email' => 'ardiyana@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Punden VIII RT 4 RW 19, Sidoluhur, Godean, Sleman, DIY', 'no_ktp' => '3404015405910010', 'no_hp' => '081234567812', 'password' => Hash::make('password'), 'kode_tps' => '48490008', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Rasdiyanti', 'email' => 'rasdiyanti@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Dadapan RT 4 RW 2, Sidoluhur, Godean, Sleman, DIY', 'no_ktp' => '3404022212960002', 'no_hp' => '081234567813', 'password' => Hash::make('password'), 'kode_tps' => '48490031', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Dwi Koratno', 'email' => 'dwi.koratno@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Jethak RT 4 RW 4, Sidokarto, Godean, Sleman, DIY', 'no_ktp' => '3404021007940002', 'no_hp' => '081234567814', 'password' => Hash::make('password'), 'kode_tps' => '48489004', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Agustinus', 'email' => 'agustinus@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Sawahan RT 1 RW 18, Sidomoyo, Godean, Sleman, DIY', 'no_ktp' => '3404021208930001', 'no_hp' => '081234567815', 'password' => Hash::make('password'), 'kode_tps' => '48486010', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Jatmiko', 'email' => 'jatmiko@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Cokro Bedog RT 9 RW 12, Sidoarum, Godean, Sleman, DIY', 'no_ktp' => '3404020107010001', 'no_hp' => '081234567816', 'password' => Hash::make('password'), 'kode_tps' => '48491005', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Puspitasari', 'email' => 'puspitasari@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Guyangan RT 10 RW 9, Guyangan, Gamping, Sleman, DIY', 'no_ktp' => '3404030901030001', 'no_hp' => '081234567817', 'password' => Hash::make('password'), 'kode_tps' => '48491018', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Eko Purwanto', 'email' => 'eko.purwanto@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Berjo Kulom RT 4 RW 4, Sidoluhur, Godean, Sleman, DIY', 'no_ktp' => '3404032812960002', 'no_hp' => '081234567818', 'password' => Hash::make('password'), 'kode_tps' => '48487001', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Totok', 'email' => 'totok@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Berjo Kulon RT 6 RW 8, Sidoluhur, Godean, Sleman, DIY', 'no_ktp' => '3404022809980001', 'no_hp' => '081234567819', 'password' => Hash::make('password'), 'kode_tps' => '48487018', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Sumarwanto', 'email' => 'sumarwanto@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Prak Bulus RT 1 RW 6, Sidomoyo, Godean, Sleman, DIY', 'no_ktp' => '3404032109990002', 'no_hp' => '081234567820', 'password' => Hash::make('password'), 'kode_tps' => '48498005', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Lestari', 'email' => 'lestari@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Gesikan RT 4 RW 4, Sidomoyo, Godean, Sleman, DIY', 'no_ktp' => '3404026605870003', 'no_hp' => '081234567821', 'password' => Hash::make('password'), 'kode_tps' => '48498009', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Heriyati', 'email' => 'heriyati@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Minggir 2 RT 6 RW 5, Sendangagung, Minggir, Sleman, DIY', 'no_ktp' => '3404032001890001', 'no_hp' => '081234567822', 'password' => Hash::make('password'), 'kode_tps' => '48498029', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Kusni', 'email' => 'kusni@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Babadan IV RT 3 RW 9, Sendangagung, Minggir, Sleman, DIY', 'no_ktp' => '3404031103990001', 'no_hp' => '081234567823', 'password' => Hash::make('password'), 'kode_tps' => '48496004', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Paryoto', 'email' => 'paryoto@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Nanggulan RT 14 RW 4, Sendangagung, Minggir, Sleman, DIY', 'no_ktp' => '3404033112860002', 'no_hp' => '081234567824', 'password' => Hash::make('password'), 'kode_tps' => '48496010', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Riyadi', 'email' => 'riyadi@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Daratan RT 3 RW 4, Sendangarum, Minggir, Sleman, DIY', 'no_ktp' => '3404030307000001', 'no_hp' => '081234567825', 'password' => Hash::make('password'), 'kode_tps' => '48497003', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Wulandari', 'email' => 'wulandari@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Ngijon RT 2 RW 15, Sendangarum, Minggir, Sleman, DIY', 'no_ktp' => '3404032710980002', 'no_hp' => '081234567826', 'password' => Hash::make('password'), 'kode_tps' => '4847015', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Tamrin', 'email' => 'tamrin@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Mregan RT 1 RW 4, Sendangmulyo, Minggir, Sleman, DIY', 'no_ktp' => '3404032412010003', 'no_hp' => '081234567827', 'password' => Hash::make('password'), 'kode_tps' => '48500015', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Bejo', 'email' => 'bejo@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Klepu Lor RT 1 RW 23, Sendangmulyo, Minggir, Sleman, DIY', 'no_ktp' => '3404030406960001', 'no_hp' => '081234567828', 'password' => Hash::make('password'), 'kode_tps' => '48500030', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Kesti', 'email' => 'kesti@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Citran RT 2 RW 6, Sendangmulyo, Minggir, Sleman, DIY', 'no_ktp' => '3404030807890001', 'no_hp' => '081234567829', 'password' => Hash::make('password'), 'kode_tps' => '48499014', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Henru', 'email' => 'henru@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Diro RT 2 RW 33, Sendangmulyo, Minggir, Sleman, DIY', 'no_ktp' => '3404031404970001', 'no_hp' => '081234567830', 'password' => Hash::make('password'), 'kode_tps' => '48494002', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Pitoyo', 'email' => 'pitoyo@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Nglengking RT 4 RW 16, Sendangrejo, Minggir, Sleman, DIY', 'no_ktp' => '3404031002870003', 'no_hp' => '081234567831', 'password' => Hash::make('password'), 'kode_tps' => '48494012', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Priyo', 'email' => 'priyo@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Soronndan RT 2 RW 36, Sendangrejo, Minggir, Sleman, DIY', 'no_ktp' => '3404032909000002', 'no_hp' => '081234567832', 'password' => Hash::make('password'), 'kode_tps' => '48494022', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Mulyadi', 'email' => 'mulyadi@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Dalangan RT 2 RW 9, Sendangsari, Minggir, Sleman, DIY', 'no_ktp' => '3404012604990001', 'no_hp' => '081234567833', 'password' => Hash::make('password'), 'kode_tps' => '48494041', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Bayu', 'email' => 'bayu@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Sutan RT 2 RW 24, Sendangsari, Minggir, Sleman, DIY', 'no_ktp' => '3404030511030001', 'no_hp' => '081234567834', 'password' => Hash::make('password'), 'kode_tps' => '48495002', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Ariaji', 'email' => 'ariaji@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Celungan RT 4 RW 2, Sumberagung, Moyudan, Sleman, DIY', 'no_ktp' => '3404010106890003', 'no_hp' => '081234567835', 'password' => Hash::make('password'), 'kode_tps' => '48495006', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Sigit', 'email' => 'sigit@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Ponggok RT 1 RW 13, Sumberagung, Moyudan, Sleman, DIY', 'no_ktp' => '3404022603020002', 'no_hp' => '081234567836', 'password' => Hash::make('password'), 'kode_tps' => '48495026', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Candra', 'email' => 'candra@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Kaliduren RT 2 RW 3, Sumberagung, Moyudan, Sleman, DIY', 'no_ktp' => '3404011909860002', 'no_hp' => '081234567837', 'password' => Hash::make('password'), 'kode_tps' => '48492002', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Widya', 'email' => 'widya@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Godongan RT 2 RW 47, Sumberagung, Moyudan, Sleman, DIY', 'no_ktp' => '3404012107880001', 'no_hp' => '081234567838', 'password' => Hash::make('password'), 'kode_tps' => '48492012', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Hartati', 'email' => 'hartati@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Puluhan RT 2 RW 3, Sumberarum, Moyudan, Sleman, DIY', 'no_ktp' => '3404022712010001', 'no_hp' => '081234567839', 'password' => Hash::make('password'), 'kode_tps' => '48492023', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Ernawati', 'email' => 'ernawati@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Jitar RT 4 RW 9, Sumberarum, Moyudan, Sleman, DIY', 'no_ktp' => '3404010813940002', 'no_hp' => '081234567840', 'password' => Hash::make('password'), 'kode_tps' => '48505001', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Indah', 'email' => 'indah@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Sermo RT 5 RW 35, Sumberarum, Moyudan, Sleman, DIY', 'no_ktp' => '3404011711870003', 'no_hp' => '081234567841', 'password' => Hash::make('password'), 'kode_tps' => '48505010', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Reny', 'email' => 'reny@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Gamplong RT 1 RW 4, Sumberrahayu, Moyudan, Sleman, DIY', 'no_ktp' => '3404022311880002', 'no_hp' => '081234567842', 'password' => Hash::make('password'), 'kode_tps' => '48505021', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Ali Maksum', 'email' => 'ali.maksum@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Barepan RT 5 RW 16, Sumberrahayu, Moyudan, Sleman, DIY', 'no_ktp' => '3404011512910001', 'no_hp' => '081234567843', 'password' => Hash::make('password'), 'kode_tps' => '48502002', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Haryanto', 'email' => 'haryanto@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Saren RT 4 RW 30, Sumberrahayu, Moyudan, Sleman, DIY', 'no_ktp' => '3404012801930001', 'no_hp' => '081234567844', 'password' => Hash::make('password'), 'kode_tps' => '48502010', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Dahlia', 'email' => 'dahlia@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Tlukan RT 5 RW 7, Sumbersari, Moyudan, Sleman, DIY', 'no_ktp' => '3404021804010001', 'no_hp' => '081234567845', 'password' => Hash::make('password'), 'kode_tps' => '48503002', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Mawarni', 'email' => 'mawarni@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Semingin RT 2 RW 9, Sumbersari, Moyudan, Sleman, DIY', 'no_ktp' => '3404039503860002', 'no_hp' => '081234567846', 'password' => Hash::make('password'), 'kode_tps' => '48501005', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Udiyana', 'email' => 'udiyana@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Sombongan RT 7 RW 35, Sumbersari, Moyudan, Sleman, DIY', 'no_ktp' => '3404031607960002', 'no_hp' => '081234567847', 'password' => Hash::make('password'), 'kode_tps' => '48501024', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Ambarwati', 'email' => 'ambarwati@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Watukarung RT 1 RW 1, Margoagung, Seyegan, Sleman, DIY', 'no_ktp' => '3404011901870003', 'no_hp' => '081234567848', 'password' => Hash::make('password'), 'kode_tps' => '48504007', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Perempuan', 'role' => 'saksi'],
            ['nama' => 'Hariyadi', 'email' => 'hariyadi@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Beteng RT 3 RW 12, Margoagung, Seyegan, Sleman, DIY', 'no_ktp' => '3404020802890001', 'no_hp' => '081234567849', 'password' => Hash::make('password'), 'kode_tps' => '48504039', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi'],
            ['nama' => 'Purwadi', 'email' => 'purwadi@gmail.com', 'email_verified_at' => now(), 'alamat_tinggal' => 'Somorai RT 5 RW 16, Margoagung, Seyegan, Sleman, DIY', 'no_ktp' => '3404022201930001', 'no_hp' => '081234567851', 'password' => Hash::make('password'), 'kode_tps' => '48504024', 'partai' => null, 'pendidikan' => 'SMA/SMK', 'agama' => 'Islam', 'jenis_kelamin' => 'Laki-laki', 'role' => 'saksi']
  
        ];

        DB::table('users')->insert($data);
    }
}
