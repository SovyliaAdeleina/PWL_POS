<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'barang_kode' => 'NB', 'barang_nama' => 'Notebook'],
            ['barang_id' => 2, 'barang_kode' => 'KP', 'barang_nama' => 'Kotak Pensil'],
            ['barang_id' => 3, 'barang_kode' => 'KMP', 'barang_nama' => 'Kompor'],
            ['barang_id' => 4, 'barang_kode' => 'PN', 'barang_nama' => 'Panci'],
            ['barang_id' => 5, 'barang_kode' => 'AZR', 'barang_nama' => 'Azarine'],
            ['barang_id' => 6, 'barang_kode' => 'HNS', 'barang_nama' => 'Hanasui'],
            ['barang_id' => 7, 'barang_kode' => 'CBY', 'barang_nama' => 'Cussons Baby'],
            ['barang_id' => 8, 'barang_kode' => 'SW', 'barang_nama' => 'Switsal'],
            ['barang_id' => 9, 'barang_kode' => 'MBL', 'barang_nama' => 'Marina Body Lotion'],
            ['barang_id' => 10, 'barang_kode' => 'VSL', 'barang_nama' => 'Vaseline'],
        ];
        DB::table('m_barang')->insert($data);
    }
}
