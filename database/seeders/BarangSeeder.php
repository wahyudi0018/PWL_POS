<?php

namespace Database\Seeders;

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
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Chips Kentang',
                'harga_beli' => 5000,
                'harga_jual' => 8000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Coklat Snickers',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Aqua 600ml',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Teh Botol Sosro',
                'harga_beli' => 6000,
                'harga_jual' => 8000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Piring Plastik',
                'harga_beli' => 2000,
                'harga_jual' => 3000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Sendok Stainless',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Shampoo Sunsilk',
                'harga_beli' => 12000,
                'harga_jual' => 18000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Masker Wajah Garnier',
                'harga_beli' => 8000,
                'harga_jual' => 12000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'USB Flashdisk 16GB',
                'harga_beli' => 50000,
                'harga_jual' => 70000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Mouse Wireless',
                'harga_beli' => 30000,
                'harga_jual' => 45000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
