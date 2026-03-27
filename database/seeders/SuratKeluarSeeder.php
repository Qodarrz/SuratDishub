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

        SuratKeluar::create([
            'no_surat' => 'SK/2026/003',
            'tanggal_surat' => Carbon::now()->subDays(7)->format('Y-m-d'),
            'perihal' => 'Undangan Rapat Dinas',
            'surat_masuk_id' => 2,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/004',
            'tanggal_surat' => Carbon::now()->subDays(10)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Kegiatan Bakti Sosial',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/005',
            'tanggal_surat' => Carbon::now()->subDays(12)->format('Y-m-d'),
            'perihal' => 'Permohonan Izin Penelitian',
            'surat_masuk_id' => 3,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/006',
            'tanggal_surat' => Carbon::now()->subDays(15)->format('Y-m-d'),
            'perihal' => 'Surat Tugas Perjalanan Dinas',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/007',
            'tanggal_surat' => Carbon::now()->subDays(18)->format('Y-m-d'),
            'perihal' => 'Balasan Surat Penawaran Kerjasama',
            'surat_masuk_id' => 4,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/008',
            'tanggal_surat' => Carbon::now()->subDays(20)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Libur Nasional',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/009',
            'tanggal_surat' => Carbon::now()->subDays(22)->format('Y-m-d'),
            'perihal' => 'Undangan Sosialisasi Program Kerja',
            'surat_masuk_id' => 5,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/010',
            'tanggal_surat' => Carbon::now()->subDays(25)->format('Y-m-d'),
            'perihal' => 'Laporan Bulanan Operasional',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/011',
            'tanggal_surat' => Carbon::now()->subDays(28)->format('Y-m-d'),
            'perihal' => 'Konfirmasi Jadwal Rapat',
            'surat_masuk_id' => 6,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/012',
            'tanggal_surat' => Carbon::now()->subDays(30)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Pergantian Jadwal',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/013',
            'tanggal_surat' => Carbon::now()->subDays(32)->format('Y-m-d'),
            'perihal' => 'Undangan Acara Halal Bihalal',
            'surat_masuk_id' => 7,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/014',
            'tanggal_surat' => Carbon::now()->subDays(35)->format('Y-m-d'),
            'perihal' => 'Pengiriman Dokumen Kontrak',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/015',
            'tanggal_surat' => Carbon::now()->subDays(38)->format('Y-m-d'),
            'perihal' => 'Notulen Rapat Bulanan',
            'surat_masuk_id' => 8,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/016',
            'tanggal_surat' => Carbon::now()->subDays(40)->format('Y-m-d'),
            'perihal' => 'Permohonan Data Statistik',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/017',
            'tanggal_surat' => Carbon::now()->subDays(42)->format('Y-m-d'),
            'perihal' => 'Surat Tugas Dinas Luar',
            'surat_masuk_id' => 9,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/018',
            'tanggal_surat' => Carbon::now()->subDays(45)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Pemeliharaan Gedung',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/019',
            'tanggal_surat' => Carbon::now()->subDays(48)->format('Y-m-d'),
            'perihal' => 'Evaluasi Kinerja Triwulan',
            'surat_masuk_id' => 10,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/020',
            'tanggal_surat' => Carbon::now()->subDays(50)->format('Y-m-d'),
            'perihal' => 'Pengumuman Rekrutmen Karyawan',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/021',
            'tanggal_surat' => Carbon::now()->subDays(52)->format('Y-m-d'),
            'perihal' => 'Balasan Surat Penawaran',
            'surat_masuk_id' => 11,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/022',
            'tanggal_surat' => Carbon::now()->subDays(55)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Pemutakhiran Data',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/023',
            'tanggal_surat' => Carbon::now()->subDays(58)->format('Y-m-d'),
            'perihal' => 'Undang Rapat Evaluasi Proyek',
            'surat_masuk_id' => 12,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/024',
            'tanggal_surat' => Carbon::now()->subDays(60)->format('Y-m-d'),
            'perihal' => 'Laporan Akhir Tahun',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/025',
            'tanggal_surat' => Carbon::now()->subDays(62)->format('Y-m-d'),
            'perihal' => 'Permohonan Rekomendasi',
            'surat_masuk_id' => 13,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/026',
            'tanggal_surat' => Carbon::now()->subDays(65)->format('Y-m-d'),
            'perihal' => 'Konfirmasi Kehadiran Acara',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/027',
            'tanggal_surat' => Carbon::now()->subDays(68)->format('Y-m-d'),
            'perihal' => 'Pengajuan Cuti Bersama',
            'surat_masuk_id' => 14,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/028',
            'tanggal_surat' => Carbon::now()->subDays(70)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Perubahan Struktur',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/029',
            'tanggal_surat' => Carbon::now()->subDays(72)->format('Y-m-d'),
            'perihal' => 'Undangan Pelatihan Karyawan',
            'surat_masuk_id' => 15,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/030',
            'tanggal_surat' => Carbon::now()->subDays(75)->format('Y-m-d'),
            'perihal' => 'Laporan Keuangan Semester',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/031',
            'tanggal_surat' => Carbon::now()->subDays(78)->format('Y-m-d'),
            'perihal' => 'Balasan Tawaran Kerjasama',
            'surat_masuk_id' => 16,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/032',
            'tanggal_surat' => Carbon::now()->subDays(80)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Maintenance Sistem',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/033',
            'tanggal_surat' => Carbon::now()->subDays(82)->format('Y-m-d'),
            'perihal' => 'Undangan Gathering Tahunan',
            'surat_masuk_id' => 17,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/034',
            'tanggal_surat' => Carbon::now()->subDays(85)->format('Y-m-d'),
            'perihal' => 'Surat Keputusan Promosi',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/035',
            'tanggal_surat' => Carbon::now()->subDays(88)->format('Y-m-d'),
            'perihal' => 'Permohonan Perpanjangan Kontrak',
            'surat_masuk_id' => 18,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/036',
            'tanggal_surat' => Carbon::now()->subDays(90)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Kenaikan Gaji',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/037',
            'tanggal_surat' => Carbon::now()->subDays(92)->format('Y-m-d'),
            'perihal' => 'Undang Rapat Strategis',
            'surat_masuk_id' => 19,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/038',
            'tanggal_surat' => Carbon::now()->subDays(95)->format('Y-m-d'),
            'perihal' => 'Laporan Kegiatan Sosial',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/039',
            'tanggal_surat' => Carbon::now()->subDays(98)->format('Y-m-d'),
            'perihal' => 'Pengajuan Proyek Baru',
            'surat_masuk_id' => 20,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/040',
            'tanggal_surat' => Carbon::now()->subDays(100)->format('Y-m-d'),
            'perihal' => 'Peringatan Hari Besar',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/041',
            'tanggal_surat' => Carbon::now()->subDays(102)->format('Y-m-d'),
            'perihal' => 'Balasan Pengaduan Masyarakat',
            'surat_masuk_id' => 21,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/042',
            'tanggal_surat' => Carbon::now()->subDays(105)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Audit Internal',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/043',
            'tanggal_surat' => Carbon::now()->subDays(108)->format('Y-m-d'),
            'perihal' => 'Undangan Workshop Digitalisasi',
            'surat_masuk_id' => 22,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/044',
            'tanggal_surat' => Carbon::now()->subDays(110)->format('Y-m-d'),
            'perihal' => 'Laporan Pelaksanaan Program',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/045',
            'tanggal_surat' => Carbon::now()->subDays(112)->format('Y-m-d'),
            'perihal' => 'Permohonan Sertifikasi',
            'surat_masuk_id' => 23,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/046',
            'tanggal_surat' => Carbon::now()->subDays(115)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Hari Keagamaan',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/047',
            'tanggal_surat' => Carbon::now()->subDays(118)->format('Y-m-d'),
            'perihal' => 'Undangan Seminar Nasional',
            'surat_masuk_id' => 24,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/048',
            'tanggal_surat' => Carbon::now()->subDays(120)->format('Y-m-d'),
            'perihal' => 'Surat Edaran Kebijakan Baru',
            'surat_masuk_id' => null,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/049',
            'tanggal_surat' => Carbon::now()->subDays(122)->format('Y-m-d'),
            'perihal' => 'Evaluasi Kinerja Tahunan',
            'surat_masuk_id' => 25,
        ]);

        SuratKeluar::create([
            'no_surat' => 'SK/2026/050',
            'tanggal_surat' => Carbon::now()->subDays(125)->format('Y-m-d'),
            'perihal' => 'Laporan Tahunan Perusahaan',
            'surat_masuk_id' => null,
        ]);
    }
}