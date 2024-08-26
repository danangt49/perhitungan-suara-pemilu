<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode_tps' => '48488001', 'no_tps' => '48488001 - TPS 001', 'alamat_tps' => 'Senuko RT 02 RW 01', 'kelurahan' => 'Sidoagung', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48488020', 'no_tps' => '48488020 - TPS 020', 'alamat_tps' => 'Dukuh VII RT 01 RW 14', 'kelurahan' => 'Sidoagung', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48490008', 'no_tps' => '48490008 - TPS 008', 'alamat_tps' => 'Bantulan RT 05 RW 04', 'kelurahan' => 'Sidoarum', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48490031', 'no_tps' => '48490031 - TPS 031', 'alamat_tps' => 'Cokro Bedog RT 11 RW 13', 'kelurahan' => 'Sidoarum', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48489004', 'no_tps' => '48489004 - TPS 004', 'alamat_tps' => 'Jethak II RT 04 RW 04', 'kelurahan' => 'Sidokarto', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48486010', 'no_tps' => '48486010 - TPS 010', 'alamat_tps' => 'Ngabangan RT 08 RW 12', 'kelurahan' => 'Sidoluhur', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48491005', 'no_tps' => '48491005 - TPS 005', 'alamat_tps' => 'Gesikan RT 04 RW 04', 'kelurahan' => 'Sidomoyo', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48491018', 'no_tps' => '48491018 - TPS 018', 'alamat_tps' => 'Pete RT 02 RW 16', 'kelurahan' => 'Sidomoyo', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48487001', 'no_tps' => '48487001 - TPS 001', 'alamat_tps' => 'Pirak Bulus RT 01 RW 01', 'kelurahan' => 'Sidomulyo', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48487018', 'no_tps' => '48487018 - TPS 018', 'alamat_tps' => 'Gancahan VIII RT 01 RW 17', 'kelurahan' => 'Sidorejo', 'kecamatan' => 'Godean', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498005', 'no_tps' => '48498005 - TPS 005', 'alamat_tps' => 'Minggir 2 RT 06 RW 05', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498009', 'no_tps' => '48498009 - TPS 009', 'alamat_tps' => 'Babadan IV RT 03 RW 09', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498029', 'no_tps' => '48498029 - TPS 029', 'alamat_tps' => 'Nanggulan 14 RT 04 RW 31', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48496004', 'no_tps' => '48496004 - TPS 004', 'alamat_tps' => 'Daratan 3 RT 04 RW 07', 'kelurahan' => 'Sendangarum', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48496010', 'no_tps' => '48496010 - TPS 010', 'alamat_tps' => 'Ngijon RT 02 RW 15', 'kelurahan' => 'Sendangarum', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48497003', 'no_tps' => '48497003 - TPS 003', 'alamat_tps' => 'Mregan RT 01 RW 94', 'kelurahan' => 'Sendangmulyo', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '4847015', 'no_tps' => '4847015 - TPS 015', 'alamat_tps' => 'Klepu Lor RT 01 RW 23', 'kelurahan' => 'Sendangmulyo', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48500015', 'no_tps' => '48500015 - TPS 015', 'alamat_tps' => 'Botokan RT 02 RW 20', 'kelurahan' => 'Sendangrejo', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48500030', 'no_tps' => '48500030 - TPS 030', 'alamat_tps' => 'Jaban RT 05 RW 37', 'kelurahan' => 'Sendangrejo', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48499014', 'no_tps' => '48499014 - TPS 014', 'alamat_tps' => 'Sutan RT 02 RW 24', 'kelurahan' => 'Sendangsari', 'kecamatan' => 'Minggir', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494002', 'no_tps' => '48494002 - TPS 002', 'alamat_tps' => 'Celungan RT 04 RW 02', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494012', 'no_tps' => '48494012 - TPS 012', 'alamat_tps' => 'Ponggok RT 01 RW 13', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494022', 'no_tps' => '48494022 - TPS 022', 'alamat_tps' => 'Kaliduren 2 RW 03 RW 23', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494041', 'no_tps' => '48494041 - TPS 041', 'alamat_tps' => 'Godongan RT 02 RW 47', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48495002', 'no_tps' => '48495002 - TPS 002', 'alamat_tps' => 'Puluhan RT 02 RW 03', 'kelurahan' => 'Sumberarum', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48495006', 'no_tps' => '48495006 - TPS 006', 'alamat_tps' => 'Jitar RT 04 RW 09', 'kelurahan' => 'Sumberarum', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48495026', 'no_tps' => '48495026 - TPS 026', 'alamat_tps' => 'Sermo RT 05 RW 35', 'kelurahan' => 'Sumberarum', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48492002', 'no_tps' => '48492002 - TPS 002', 'alamat_tps' => 'Gamplong 1 RT 04 RW 03', 'kelurahan' => 'Sumberrahayu', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48492012', 'no_tps' => '48492012 - TPS 012', 'alamat_tps' => 'Barepan RT 05 RW 18', 'kelurahan' => 'Sumberrahayu', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48492023', 'no_tps' => '48492023 - TPS 023', 'alamat_tps' => 'Saren RT 04 RW 30', 'kelurahan' => 'Sumberrahayu', 'kecamatan' => 'Moyudan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48505001', 'no_tps' => '48505001 - TPS 001', 'alamat_tps' => 'Watukarung RT 01 RW 01', 'kelurahan' => 'Margoagung', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48505010', 'no_tps' => '48505010 - TPS 010', 'alamat_tps' => 'Beteng RT 03 RW 12', 'kelurahan' => 'Margoagung', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48505021', 'no_tps' => '48505021 - TPS 021', 'alamat_tps' => 'Krapyak VII RT 02 RW 20', 'kelurahan' => 'Margoagung', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48502002', 'no_tps' => '48502002 - TPS 002', 'alamat_tps' => 'Kandangan RT 05 RW 04', 'kelurahan' => 'Margodadi', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48502010', 'no_tps' => '48502010 - TPS 010', 'alamat_tps' => 'Japanan RT 03 RW 15', 'kelurahan' => 'Margodadi', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48503002', 'no_tps' => '48503002 - TPS 002', 'alamat_tps' => 'Susukan 1 RT 03 RW 02', 'kelurahan' => 'Margokaton', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48501005', 'no_tps' => '48501005 - TPS 005', 'alamat_tps' => 'Klangkapan 1 RT 06 RW 04', 'kelurahan' => 'Margoluwih', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48501024', 'no_tps' => '48501024 - TPS 004', 'alamat_tps' => 'Cibuk Kidul RT 02 RW 22', 'kelurahan' => 'Margoluwih', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504007', 'no_tps' => '48504007 - TPS 024', 'alamat_tps' => 'Gerjen RT 05 RW 06', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504039', 'no_tps' => '48504039 - TPS 039', 'alamat_tps' => 'Jamblangan RT 07 RW 28', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504024', 'no_tps' => '48504024 - TPS 024', 'alamat_tps' => 'MANGSEL, DAPLOKAN RT 04 RW 18', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Sleman', 'provinsi' => 'DIY'],
        ];

        DB::table('tps')->insert($data);
    }
}
