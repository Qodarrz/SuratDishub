<?php

namespace Database\Seeders;

use App\Models\SuratKeluar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SuratKeluarSeeder extends Seeder
{
    public function run(): void
    {
        SuratKeluar::create([
            'no_surat' => 'SK/2026/001',
            'tanggal_surat' => Carbon::now()->subDays(4)->format('Y-m-d'),
            'perihal' => 'Balasan Undangan Rapat Koordinasi',
            'surat_masuk_id' => 1,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/002',
            'tanggal_surat' => Carbon::now()->subDays(1)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Penutupan Jalan',
            'surat_masuk_id' => null,
        ]);
    }
}
