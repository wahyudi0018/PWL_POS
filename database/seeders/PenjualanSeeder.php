<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualanData = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'PJN001',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Jane Doe',
                'penjualan_kode' => 'PJN002',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Alice Smith',
                'penjualan_kode' => 'PJN003',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Bob Johnson',
                'penjualan_kode' => 'PJN004',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Eva Williams',
                'penjualan_kode' => 'PJN005',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Michael Davis',
                'penjualan_kode' => 'PJN006',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Olivia Martin',
                'penjualan_kode' => 'PJN007',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'William Garcia',
                'penjualan_kode' => 'PJN008',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Sophia Rodriguez',
                'penjualan_kode' => 'PJN009',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Liam Hernandez',
                'penjualan_kode' => 'PJN010',
                'penjualan_tanggal' => Carbon::now(),
            ],
        ];

        DB::table('t_penjualan')->insert($penjualanData);
    }
}

