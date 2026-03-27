<?php

namespace Database\Seeders;

use App\Models\StandarTeknis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class StandarTeknisSeeder extends Seeder
{
    public function run(): void
    {
        StandarTeknis::create([
            'no_surat' => 'ST/2026/001',
            'tanggal_surat' => Carbon::now()->subDays(10)->format('Y-m-d'),
            'perihal' => 'Standar Teknis Rambu Lalu Lintas',
            'unit_kerja_id' => '1',
            'file_path' => null,
            'keterangan' => 'Standar teknis untuk pemasangan rambu baru di jalan raya',
        ]);
    }
}
