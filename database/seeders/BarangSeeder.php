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
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' =>'NB', 'barang_nama' => 'Notebook', 'harga_beli' => '25000', 'harga_jual' => '30000'],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' =>'KP', 'barang_nama' => 'Kotak Pensil', 'harga_beli' => '20000', 'harga_jual' => '25000'],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' =>'KMP', 'barang_nama' => 'Kompor', 'harga_beli' => '2000000', 'harga_jual' => '2500000'],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' =>'PN', 'barang_nama' => 'Panci', 'harga_beli' => '35000', 'harga_jual' => '40000'],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' =>'AZR', 'barang_nama' => 'Azarine', 'harga_beli' => '65000', 'harga_jual' => '70000'],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' =>'HNS', 'barang_nama' => 'Hanasui', 'harga_beli' => '88000', 'harga_jual' => '98000'],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' =>'CBY', 'barang_nama' => 'Cussons Baby', 'harga_beli' => '40000', 'harga_jual' => '45000'],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' =>'SW', 'barang_nama' => 'Switsal', 'harga_beli' => '30000', 'harga_jual' => '35000'],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' =>'MBL', 'barang_nama' => 'Marina Body Lotion', 'harga_beli' => '50000', 'harga_jual' => '60000'],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' =>'VSL', 'barang_nama' => 'Vaseline', 'harga_beli' => '24000', 'harga_jual' => '30000'],
        ];
        DB::table('m_barang')->insert($data);
    }
}
