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
            ['kode_tps' => '48481001', 'no_tps' => '48481001-TPS 001', 'alamat_tps' => 'Jalan Mejing Lor RT 02 RW 01', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481002', 'no_tps' => '48481002-TPS 002', 'alamat_tps' => 'Jalan Mejing Lor RT 04 RW 01', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481003', 'no_tps' => '48481003-TPS 003', 'alamat_tps' => 'Jalan Mejing Lor RT 01 RW 02', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481004', 'no_tps' => '48481004-TPS 004', 'alamat_tps' => 'Jalan Mejing Lor RT 02 RW 02', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481005', 'no_tps' => '48481005-TPS 005', 'alamat_tps' => 'Jalan Mejing Lor RT 01 RW 03', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481006', 'no_tps' => '48481006-TPS 006', 'alamat_tps' => 'Jalan Mejing Lor RT 04 RW 38', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481007', 'no_tps' => '48481007-TPS 007', 'alamat_tps' => 'Jalan Mejing Lor RT 03 RW 03', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481008', 'no_tps' => '48481008-TPS 008', 'alamat_tps' => 'Jalan Mejing Wetan RT 02 RW 04', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481009', 'no_tps' => '48481009-TPS 009', 'alamat_tps' => 'Jalan Mejing Wetan RT 04 RW 05', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481010', 'no_tps' => '48481010-TPS 010', 'alamat_tps' => 'Jalan Mejing Wetan RT 05 RW 05', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48481011', 'no_tps' => '48481011-TPS 011', 'alamat_tps' => 'Jalan Mejing Wetan RT 07 RW 06', 'kelurahan' => 'Mejing', 'kecamatan' => 'Gamping', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],

            ['kode_tps' => '48484049', 'no_tps' => '48484049-TPS 049', 'alamat_tps' => 'Jalan Panggungan RT 002 RW 032', 'kelurahan' => 'Panggungan', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48484050', 'no_tps' => '48484050-TPS 050', 'alamat_tps' => 'Jalan Panggungan Lor RT 02 RW 32', 'kelurahan' => 'Panggungan', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48484051', 'no_tps' => '48484051-TPS 051', 'alamat_tps' => 'Jalan Panggungan RT 04 RW 33', 'kelurahan' => 'Panggungan', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48484052', 'no_tps' => '48484052-TPS 052', 'alamat_tps' => 'Jalan Besole RT 06 RW 34', 'kelurahan' => 'Besole', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48484053', 'no_tps' => '48484053-TPS 053', 'alamat_tps' => 'Jalan Besole RT 07 RW 34', 'kelurahan' => 'Besole', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48484054', 'no_tps' => '48484054-TPS 054', 'alamat_tps' => 'Jalan Nusupan RT 07 RW 35', 'kelurahan' => 'Nusupan', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],

            ['kode_tps' => '48488001', 'no_tps' => '48488001-TPS 001', 'alamat_tps' => 'Jalan Senuko RT 02 RW 01', 'kelurahan' => 'Senuko', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48488002', 'no_tps' => '48488002-TPS 002', 'alamat_tps' => 'Jalan Senuko RT 03 RW 01', 'kelurahan' => 'Senuko', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48488003', 'no_tps' => '48488003-TPS 003', 'alamat_tps' => 'Jalan Senuko RT 05 RW 02', 'kelurahan' => 'Senuko', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48488004', 'no_tps' => '48488004-TPS 004', 'alamat_tps' => 'Jalan Sentul RT 01 RW 03', 'kelurahan' => 'Sentul', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48488005', 'no_tps' => '48488005-TPS 005', 'alamat_tps' => 'Jalan Sentul Geneng RT 03 RW 04', 'kelurahan' => 'Sentul Geneng', 'kecamatan' => 'Godean', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],

            ['kode_tps' => '48511010', 'no_tps' => '48511010-TPS 010', 'alamat_tps' => 'Jalan Karangwuni RT 02 RW 01', 'kelurahan' => 'Karangwuni', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511011', 'no_tps' => '48511011-TPS 011', 'alamat_tps' => 'Jalan Karangwuni RT 03 RW 01', 'kelurahan' => 'Karangwuni', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511012', 'no_tps' => '48511012-TPS 012', 'alamat_tps' => 'Jalan Karangwuni D11 RT 04 RW 02', 'kelurahan' => 'Karangwuni', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511013', 'no_tps' => '48511013-TPS 013', 'alamat_tps' => 'Jalan Karangwuni RT 07 RW 03', 'kelurahan' => 'Karangwuni', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511014', 'no_tps' => '48511014-TPS 014', 'alamat_tps' => 'Jalan Kocoran RT 01 RW 01', 'kelurahan' => 'Kocoran', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511015', 'no_tps' => '48511015-TPS 015', 'alamat_tps' => 'Jalan Kocoran RT 03 RW 02', 'kelurahan' => 'Kocoran', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511016', 'no_tps' => '48511016-TPS 016', 'alamat_tps' => 'Jalan Kocoran RT 05 RW 03', 'kelurahan' => 'Kocoran', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511017', 'no_tps' => '48511017-TPS 017', 'alamat_tps' => 'Jalan Kocoran RT 08 RW 04', 'kelurahan' => 'Kocoran', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511018', 'no_tps' => '48511018-TPS 018', 'alamat_tps' => 'Jalan Kocoran RT 11 RW 04', 'kelurahan' => 'Kocoran', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48511019', 'no_tps' => '48511019-TPS 019', 'alamat_tps' => 'Jalan Kocoran RT 13 RW 05', 'kelurahan' => 'Kocoran', 'kecamatan' => 'Depok', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
        ];

        DB::table('tps')->insert($data);
    }
}
