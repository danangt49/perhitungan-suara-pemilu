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
            
            ['kode_tps' => '48504024', 'no_tps' => '48504024-TPS 024', 'alamat_tps' => 'MANGSEL, DAPLOKAN RT 04 RW 18', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504025', 'no_tps' => '48504025-TPS 025', 'alamat_tps' => 'KASURAN WETAN RT 01 RW 19', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504026', 'no_tps' => '48504026-TPS 026', 'alamat_tps' => 'KASURAN X RT 02 RW 19', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504027', 'no_tps' => '48504027-TPS 027', 'alamat_tps' => 'MRIYAN X KASURAN RT 06 RW 20', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504028', 'no_tps' => '48504028-TPS 028', 'alamat_tps' => 'MRIYAN X KASURAN RT 07 RW 20', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504029', 'no_tps' => '48504029-TPS 029', 'alamat_tps' => 'MRIYAN XI RT 02 RW 21', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504030', 'no_tps' => '48504030-TPS 030', 'alamat_tps' => 'MRIYAN XI RT 04 RW 22', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504031', 'no_tps' => '48504031-TPS 031', 'alamat_tps' => 'MRIYAN XI RT 06 RW 22', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504032', 'no_tps' => '48504032-TPS 032', 'alamat_tps' => 'MRIYAN XI RT 07 RW 22', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504033', 'no_tps' => '48504033-TPS 033', 'alamat_tps' => 'JINGIN RT 02 RW 23', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504034', 'no_tps' => '48504034-TPS 034', 'alamat_tps' => 'JINGIN RT 04 RW 24', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504035', 'no_tps' => '48504035-TPS 035', 'alamat_tps' => 'JINGIN RT 05 RW 25', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504036', 'no_tps' => '48504036-TPS 036', 'alamat_tps' => 'JAMBLANGAN RT 02 RW 26', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504037', 'no_tps' => '48504037-TPS 037', 'alamat_tps' => 'JAMBLANGAN RT 03 RW 26', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504038', 'no_tps' => '48504038-TPS 038', 'alamat_tps' => 'JAMBLANGAN RT 05 RW 27', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48504039', 'no_tps' => '48504039-TPS 039', 'alamat_tps' => 'JAMBLANGAN RT 07 RW 28', 'kelurahan' => 'Margomulyo', 'kecamatan' => 'Seyegan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],

            ['kode_tps' => '48498001', 'no_tps' => '48498001-TPS 001', 'alamat_tps' => 'KISIK 1 RT 01 RW 01', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498002', 'no_tps' => '48498002-TPS 002', 'alamat_tps' => 'KISIK 1 RT 06 RW 02', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498003', 'no_tps' => '48498003-TPS 003', 'alamat_tps' => 'MINGGIR 2 RT 01 RW 03', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498004', 'no_tps' => '48498004-TPS 004', 'alamat_tps' => 'MINGGIR II RT 04 RW 04', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498005', 'no_tps' => '48498005-TPS 005', 'alamat_tps' => 'MINGGIR 2 RT 06 RW 05', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498006', 'no_tps' => '48498006-TPS 006', 'alamat_tps' => 'MINGGIR III RT 01 RW 06', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498007', 'no_tps' => '48498007-TPS 007', 'alamat_tps' => 'MINGGIR III RT 04 RW 07', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498008', 'no_tps' => '48498008-TPS 008', 'alamat_tps' => 'POJOK IV RT 01 RW 08', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498009', 'no_tps' => '48498009-TPS 009', 'alamat_tps' => 'BABADAN IV RT 03 RW 09', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498010', 'no_tps' => '48498010-TPS 010', 'alamat_tps' => 'POJOK V RT 03 RW 10', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498011', 'no_tps' => '48498011-TPS 011', 'alamat_tps' => 'POJOK V RT 04 RW 11', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498012', 'no_tps' => '48498012-TPS 012', 'alamat_tps' => 'BARAN RT 01 RW 12', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498013', 'no_tps' => '48498013-TPS 013', 'alamat_tps' => 'WATUGAJAH RT 03 RW 13', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498014', 'no_tps' => '48498014-TPS 014', 'alamat_tps' => 'BONTITAN VII RT 02 RW 14', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48498015', 'no_tps' => '48498015-TPS 015', 'alamat_tps' => 'SRAGAN, BONTITAN VII RT 04 RW 15', 'kelurahan' => 'Sendangagung', 'kecamatan' => 'Minggir', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],

            ['kode_tps' => '48494001', 'no_tps' => '48494001-TPS 001', 'alamat_tps' => 'PATEN CELUNGAN RT 03 RW 01', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494002', 'no_tps' => '48494002-TPS 002', 'alamat_tps' => 'CELUNGAN RT 04 RW 02', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494003', 'no_tps' => '48494003-TPS 003', 'alamat_tps' => 'PEDARAN KALIURANG', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494004', 'no_tps' => '48494004-TPS 004', 'alamat_tps' => 'TANON KALIURANG RT 05 RW 04', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494005', 'no_tps' => '48494005-TPS 005', 'alamat_tps' => 'KRUWET RT 02 RW 05', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494006', 'no_tps' => '48494006-TPS 006', 'alamat_tps' => 'KRUWET RT 04 RW 06', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494007', 'no_tps' => '48494007-TPS 007', 'alamat_tps' => 'SUMBERAN RT 01 RW 07', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494008', 'no_tps' => '48494008-TPS 008', 'alamat_tps' => 'SUMBERAN RT 05 RW 08', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494009', 'no_tps' => '48494009-TPS 009', 'alamat_tps' => 'NGENTO-ENTO RT 04 RW 10', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494010', 'no_tps' => '48494010-TPS 010', 'alamat_tps' => 'NULISAN RT 01 RW 11', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494011', 'no_tps' => '48494011-TPS 011', 'alamat_tps' => 'NULISAN RT 04 RW 12', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
            ['kode_tps' => '48494012', 'no_tps' => '48494012-TPS 012', 'alamat_tps' => 'PONGGOK RT 01 RW 13', 'kelurahan' => 'Sumberagung', 'kecamatan' => 'Moyudan', 'kota' => 'Yogyakarta', 'provinsi' => 'DIY'],
        ];

        DB::table('tps')->insert($data);
    }
}
