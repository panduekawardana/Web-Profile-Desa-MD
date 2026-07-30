<?php

namespace Database\Seeders;

use App\Models\LaporanPertanggungjawaban;
use App\Models\PeraturanDesa;
use App\Models\PeraturanKepalaDesa;
use Illuminate\Database\Seeder;

class DokumenLegalSeeder extends Seeder
{
    public function run(): void
    {
        $perdes = [
            ['nomor' => 'Perdes No. 03/2024', 'tentang' => 'Anggaran Pendapatan dan Belanja Desa 2024', 'kategori' => 'Anggaran', 'tanggal_ditetapkan' => '2024-01-12'],
            ['nomor' => 'Perdes No. 07/2023', 'tentang' => 'Pengelolaan Badan Usaha Milik Desa', 'kategori' => 'BUMDes', 'tanggal_ditetapkan' => '2023-09-18'],
            ['nomor' => 'Perdes No. 02/2023', 'tentang' => 'Rencana Pembangunan Jangka Menengah Desa', 'kategori' => 'Pembangunan', 'tanggal_ditetapkan' => '2023-03-05'],
        ];
        foreach ($perdes as $p) {
            PeraturanDesa::updateOrCreate(['nomor' => $p['nomor']], $p);
        }

        $perkades = [
            ['nomor' => 'Perkades No. 05/2024', 'tentang' => 'Penetapan Pelaksana Teknis Kegiatan Anggaran Desa', 'tanggal_ditetapkan' => '2024-02-10'],
            ['nomor' => 'Perkades No. 02/2024', 'tentang' => 'Standar Operasional Pelayanan Administrasi Kependudukan', 'tanggal_ditetapkan' => '2024-01-15'],
        ];
        foreach ($perkades as $p) {
            PeraturanKepalaDesa::updateOrCreate(['nomor' => $p['nomor']], $p);
        }

        $lpjs = [
            ['tahun' => '2023', 'status' => 'Disetujui BPD', 'tanggal_disampaikan' => '2024-01-15'],
            ['tahun' => '2022', 'status' => 'Disetujui BPD', 'tanggal_disampaikan' => '2023-01-10'],
        ];
        foreach ($lpjs as $l) {
            LaporanPertanggungjawaban::updateOrCreate(['tahun' => $l['tahun']], $l);
        }
    }
}
