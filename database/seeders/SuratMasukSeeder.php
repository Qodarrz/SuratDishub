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

        SuratMasuk::create([
            'no_surat' => 'SM/2026/003',
            'tanggal_surat' => Carbon::now()->subDays(7)->format('Y-m-d'),
            'perihal' => 'Permohonan Izin Penelitian',
            'is_read' => true,
            'divisi' => 'Bidang Penelitian',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/004',
            'tanggal_surat' => Carbon::now()->subDays(9)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Kegiatan Bakti Sosial',
            'is_read' => false,
            'divisi' => 'Bidang Sosial',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/005',
            'tanggal_surat' => Carbon::now()->subDays(11)->format('Y-m-d'),
            'perihal' => 'Undangan Sosialisasi Program',
            'is_read' => true,
            'divisi' => 'Bidang Pelayanan',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/006',
            'tanggal_surat' => Carbon::now()->subDays(13)->format('Y-m-d'),
            'perihal' => 'Laporan Bulanan Operasional',
            'is_read' => false,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/007',
            'tanggal_surat' => Carbon::now()->subDays(15)->format('Y-m-d'),
            'perihal' => 'Surat Tugas Perjalanan Dinas',
            'is_read' => true,
            'divisi' => 'Bidang Kepegawaian',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/008',
            'tanggal_surat' => Carbon::now()->subDays(17)->format('Y-m-d'),
            'perihal' => 'Penawaran Kerjasama',
            'is_read' => false,
            'divisi' => 'Bidang Kerjasama',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/009',
            'tanggal_surat' => Carbon::now()->subDays(19)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Libur Nasional',
            'is_read' => true,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/010',
            'tanggal_surat' => Carbon::now()->subDays(21)->format('Y-m-d'),
            'perihal' => 'Konfirmasi Jadwal Rapat',
            'is_read' => false,
            'divisi' => 'Bidang Lalu Lintas',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/011',
            'tanggal_surat' => Carbon::now()->subDays(23)->format('Y-m-d'),
            'perihal' => 'Permohonan Data Statistik',
            'is_read' => true,
            'divisi' => 'Bidang Data & Informasi',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/012',
            'tanggal_surat' => Carbon::now()->subDays(25)->format('Y-m-d'),
            'perihal' => 'Pemberitahuan Pergantian Jadwal',
            'is_read' => false,
            'divisi' => 'Bidang Lalu Lintas',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/013',
            'tanggal_surat' => Carbon::now()->subDays(27)->format('Y-m-d'),
            'perihal' => 'Undangan Halal Bihalal',
            'is_read' => true,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/014',
            'tanggal_surat' => Carbon::now()->subDays(29)->format('Y-m-d'),
            'perihal' => 'Dokumen Kontrak Kerjasama',
            'is_read' => false,
            'divisi' => 'Bidang Hukum',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/015',
            'tanggal_surat' => Carbon::now()->subDays(31)->format('Y-m-d'),
            'perihal' => 'Notulen Rapat Bulanan',
            'is_read' => true,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/016',
            'tanggal_surat' => Carbon::now()->subDays(33)->format('Y-m-d'),
            'perihal' => 'Permohonan Rekomendasi Teknis',
            'is_read' => false,
            'divisi' => 'Bidang Teknis',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/017',
            'tanggal_surat' => Carbon::now()->subDays(35)->format('Y-m-d'),
            'perihal' => 'Surat Tugas Dinas Luar Kota',
            'is_read' => true,
            'divisi' => 'Bidang Kepegawaian',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/018',
            'tanggal_surat' => Carbon::now()->subDays(37)->format('Y-m-d'),
            'perihal' => 'Pemeliharaan Gedung Kantor',
            'is_read' => false,
            'divisi' => 'Bidang Umum',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/019',
            'tanggal_surat' => Carbon::now()->subDays(39)->format('Y-m-d'),
            'perihal' => 'Evaluasi Kinerja Triwulan',
            'is_read' => true,
            'divisi' => 'Bidang SDM',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/020',
            'tanggal_surat' => Carbon::now()->subDays(41)->format('Y-m-d'),
            'perihal' => 'Pengumuman Rekrutmen',
            'is_read' => false,
            'divisi' => 'Bidang Kepegawaian',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/021',
            'tanggal_surat' => Carbon::now()->subDays(43)->format('Y-m-d'),
            'perihal' => 'Penawaran Proyek Baru',
            'is_read' => true,
            'divisi' => 'Bidang Perencanaan',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/022',
            'tanggal_surat' => Carbon::now()->subDays(45)->format('Y-m-d'),
            'perihal' => 'Pemutakhiran Data Karyawan',
            'is_read' => false,
            'divisi' => 'Bidang Data & Informasi',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/023',
            'tanggal_surat' => Carbon::now()->subDays(47)->format('Y-m-d'),
            'perihal' => 'Rapat Evaluasi Proyek',
            'is_read' => true,
            'divisi' => 'Bidang Proyek',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/024',
            'tanggal_surat' => Carbon::now()->subDays(49)->format('Y-m-d'),
            'perihal' => 'Laporan Akhir Tahun Anggaran',
            'is_read' => false,
            'divisi' => 'Bidang Keuangan',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/025',
            'tanggal_surat' => Carbon::now()->subDays(51)->format('Y-m-d'),
            'perihal' => 'Permohonan Rekomendasi',
            'is_read' => true,
            'divisi' => 'Bidang Hukum',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/026',
            'tanggal_surat' => Carbon::now()->subDays(53)->format('Y-m-d'),
            'perihal' => 'Konfirmasi Kehadiran Acara',
            'is_read' => false,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/027',
            'tanggal_surat' => Carbon::now()->subDays(55)->format('Y-m-d'),
            'perihal' => 'Pengajuan Cuti Bersama',
            'is_read' => true,
            'divisi' => 'Bidang Kepegawaian',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/028',
            'tanggal_surat' => Carbon::now()->subDays(57)->format('Y-m-d'),
            'perihal' => 'Perubahan Struktur Organisasi',
            'is_read' => false,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/029',
            'tanggal_surat' => Carbon::now()->subDays(59)->format('Y-m-d'),
            'perihal' => 'Pelatihan Karyawan',
            'is_read' => true,
            'divisi' => 'Bidang SDM',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/030',
            'tanggal_surat' => Carbon::now()->subDays(61)->format('Y-m-d'),
            'perihal' => 'Laporan Keuangan Semester',
            'is_read' => false,
            'divisi' => 'Bidang Keuangan',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/031',
            'tanggal_surat' => Carbon::now()->subDays(63)->format('Y-m-d'),
            'perihal' => 'Tawaran Kerjasama Strategis',
            'is_read' => true,
            'divisi' => 'Bidang Kerjasama',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/032',
            'tanggal_surat' => Carbon::now()->subDays(65)->format('Y-m-d'),
            'perihal' => 'Maintenance Sistem Informasi',
            'is_read' => false,
            'divisi' => 'Bidang IT',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/033',
            'tanggal_surat' => Carbon::now()->subDays(67)->format('Y-m-d'),
            'perihal' => 'Gathering Tahunan',
            'is_read' => true,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/034',
            'tanggal_surat' => Carbon::now()->subDays(69)->format('Y-m-d'),
            'perihal' => 'Keputusan Promosi Jabatan',
            'is_read' => false,
            'divisi' => 'Bidang Kepegawaian',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/035',
            'tanggal_surat' => Carbon::now()->subDays(71)->format('Y-m-d'),
            'perihal' => 'Perpanjangan Kontrak Kerja',
            'is_read' => true,
            'divisi' => 'Bidang Hukum',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/036',
            'tanggal_surat' => Carbon::now()->subDays(73)->format('Y-m-d'),
            'perihal' => 'Kenaikan Gaji Berkala',
            'is_read' => false,
            'divisi' => 'Bidang Kepegawaian',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/037',
            'tanggal_surat' => Carbon::now()->subDays(75)->format('Y-m-d'),
            'perihal' => 'Rapat Strategis Tahunan',
            'is_read' => true,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/038',
            'tanggal_surat' => Carbon::now()->subDays(77)->format('Y-m-d'),
            'perihal' => 'Kegiatan Sosial Kemasyarakatan',
            'is_read' => false,
            'divisi' => 'Bidang Sosial',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/039',
            'tanggal_surat' => Carbon::now()->subDays(79)->format('Y-m-d'),
            'perihal' => 'Proyek Pembangunan Baru',
            'is_read' => true,
            'divisi' => 'Bidang Proyek',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/040',
            'tanggal_surat' => Carbon::now()->subDays(81)->format('Y-m-d'),
            'perihal' => 'Peringatan Hari Ulang Tahun',
            'is_read' => false,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/041',
            'tanggal_surat' => Carbon::now()->subDays(83)->format('Y-m-d'),
            'perihal' => 'Pengaduan Masyarakat',
            'is_read' => true,
            'divisi' => 'Bidang Pengaduan',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/042',
            'tanggal_surat' => Carbon::now()->subDays(85)->format('Y-m-d'),
            'perihal' => 'Audit Internal',
            'is_read' => false,
            'divisi' => 'Bidang Audit',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/043',
            'tanggal_surat' => Carbon::now()->subDays(87)->format('Y-m-d'),
            'perihal' => 'Workshop Digitalisasi',
            'is_read' => true,
            'divisi' => 'Bidang IT',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/044',
            'tanggal_surat' => Carbon::now()->subDays(89)->format('Y-m-d'),
            'perihal' => 'Laporan Pelaksanaan Program',
            'is_read' => false,
            'divisi' => 'Bidang Program',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/045',
            'tanggal_surat' => Carbon::now()->subDays(91)->format('Y-m-d'),
            'perihal' => 'Sertifikasi ISO',
            'is_read' => true,
            'divisi' => 'Bidang Mutu',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/046',
            'tanggal_surat' => Carbon::now()->subDays(93)->format('Y-m-d'),
            'perihal' => 'Peringatan Hari Keagamaan',
            'is_read' => false,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/047',
            'tanggal_surat' => Carbon::now()->subDays(95)->format('Y-m-d'),
            'perihal' => 'Seminar Nasional',
            'is_read' => true,
            'divisi' => 'Bidang Pendidikan',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/048',
            'tanggal_surat' => Carbon::now()->subDays(97)->format('Y-m-d'),
            'perihal' => 'Edaran Kebijakan Baru',
            'is_read' => false,
            'divisi' => 'Sekretariat',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/049',
            'tanggal_surat' => Carbon::now()->subDays(99)->format('Y-m-d'),
            'perihal' => 'Evaluasi Kinerja Tahunan',
            'is_read' => true,
            'divisi' => 'Bidang SDM',
        ]);

        SuratMasuk::create([
            'no_surat' => 'SM/2026/050',
            'tanggal_surat' => Carbon::now()->subDays(101)->format('Y-m-d'),
            'perihal' => 'Laporan Tahunan Perusahaan',
            'is_read' => false,
            'divisi' => 'Sekretariat',
        ]);
    }
}