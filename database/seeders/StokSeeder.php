<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stokData = [
            [
                'stok_id' => 1,
                'barang_id' => 1,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 20,
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 30,
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 25,
            ],
            [
                'stok_id' => 4,
                'barang_id' => 4,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 40,
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 15,
            ],
            [
                'stok_id' => 6,
                'barang_id' => 6,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 50,
            ],
            [
                'stok_id' => 7,
                'barang_id' => 7,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 22,
            ],
            [
                'stok_id' => 8,
                'barang_id' => 8,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 18,
            ],
            [
                'stok_id' => 9,
                'barang_id' => 9,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 35,
            ],
            [
                'stok_id' => 10,
                'barang_id' => 10,
                'user_id' => 3,
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 28,
            ],
        ];

        DB::table('t_stok')->insert($stokData);
    }
}
