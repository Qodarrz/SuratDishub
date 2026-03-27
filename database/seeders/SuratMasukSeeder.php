<?php

namespace Database\Seeders;

use App\Models\SuratMasuk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SuratMasukSeeder extends Seeder
{
    public function run(): void
    {
        SuratMasuk::create([
            'no_surat' => 'SM/2026/001',
            'tanggal_surat' => Carbon::now()->subDays(5)->format('Y-m-d'),  
            'perihal' => 'Undangan Rapat Koordinasi',
            'is_read' => true,
            'divisi' => 'Bidang Lalu Lintas',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/002',
            'tanggal_surat' => Carbon::now()->subDays(2)->format('Y-m-d'),
            'perihal' => 'Pengajuan Anggaran Triwulan I',
            'is_read' => false,
            'divisi' => 'Sekretariat',
        ]);
    }
}
