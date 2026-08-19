<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    public function run(): void
    {
        $dusuns = [
            'Manggong Daye', 'Montong Sejagat', 'Bebie Baru', 'Lendang Batah Bat',
            'Karang Lebah', 'Aik Gereng', 'Lendang Batah Lauq', 'Alung',
            'Anak Nao', 'Bebie Daye', 'Bebie Timuq', 'Bebie Lauq', 'Mertak Gawah',
            'Lendang Batah', 'Manggong Lauq',
        ];

        foreach ($dusuns as $i => $nama) {
            Dusun::updateOrCreate(
                ['nama' => $nama],
                ['urutan' => $i + 1]
            );
        }
    }
}
