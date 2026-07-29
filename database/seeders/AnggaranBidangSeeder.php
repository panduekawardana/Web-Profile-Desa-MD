<?php

namespace Database\Seeders;

use App\Models\AnggaranBidang;
use Illuminate\Database\Seeder;

class AnggaranBidangSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['bidang' => 'Penyelenggaraan Pemerintahan', 'persen' => 30, 'urutan' => 1],
            ['bidang' => 'Pembangunan Desa', 'persen' => 40, 'urutan' => 2],
            ['bidang' => 'Pembinaan Kemasyarakatan', 'persen' => 15, 'urutan' => 3],
            ['bidang' => 'Pemberdayaan Masyarakat', 'persen' => 15, 'urutan' => 4],
        ];

        foreach ($items as $item) {
            AnggaranBidang::updateOrCreate(['bidang' => $item['bidang']], $item);
        }
    }
}
