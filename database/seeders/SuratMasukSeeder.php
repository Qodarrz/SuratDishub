<?php

namespace Database\Seeders;

use App\Models\SuratKeluar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SuratKeluarSeeder extends Seeder
{
    public function run(): void
    {
        $suratKeluarData = [
            // January 2026
            [
                'no_surat' => 'SK/2026/001',
                'tanggal_surat' => '2026-01-05',
                'perihal' => 'Balasan Undangan Rapat Koordinasi',
                'surat_masuk_id' => 1,
            ],
            [
                'no_surat' => 'SK/2026/002',
                'tanggal_surat' => '2026-01-08',
                'perihal' => 'Pemberitahuan Penutupan Jalan',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/003',
                'tanggal_surat' => '2026-01-12',
                'perihal' => 'Undangan Sosialisasi Program Kerja',
                'surat_masuk_id' => 2,
            ],
            [
                'no_surat' => 'SK/2026/004',
                'tanggal_surat' => '2026-01-15',
                'perihal' => 'Pengajuan Anggaran Kegiatan',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/005',
                'tanggal_surat' => '2026-01-18',
                'perihal' => 'Laporan Bulanan Operasional',
                'surat_masuk_id' => 3,
            ],
            
            // February 2026
            [
                'no_surat' => 'SK/2026/006',
                'tanggal_surat' => '2026-02-01',
                'perihal' => 'Permohonan Izin Penelitian',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/007',
                'tanggal_surat' => '2026-02-03',
                'perihal' => 'Konfirmasi Jadwal Rapat',
                'surat_masuk_id' => 4,
            ],
            [
                'no_surat' => 'SK/2026/008',
                'tanggal_surat' => '2026-02-07',
                'perihal' => 'Pemberitahuan Pergantian Jadwal',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/009',
                'tanggal_surat' => '2026-02-10',
                'perihal' => 'Undangan Acara Halal Bihalal',
                'surat_masuk_id' => 5,
            ],
            [
                'no_surat' => 'SK/2026/010',
                'tanggal_surat' => '2026-02-14',
                'perihal' => 'Pengiriman Dokumen Kontrak',
                'surat_masuk_id' => null,
            ],
            
            // March 2026
            [
                'no_surat' => 'SK/2026/011',
                'tanggal_surat' => '2026-03-02',
                'perihal' => 'Notulen Rapat Bulanan',
                'surat_masuk_id' => 6,
            ],
            [
                'no_surat' => 'SK/2026/012',
                'tanggal_surat' => '2026-03-05',
                'perihal' => 'Permohonan Data Statistik',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/013',
                'tanggal_surat' => '2026-03-09',
                'perihal' => 'Surat Tugas Dinas Luar',
                'surat_masuk_id' => 7,
            ],
            [
                'no_surat' => 'SK/2026/014',
                'tanggal_surat' => '2026-03-12',
                'perihal' => 'Pemberitahuan Libur Nasional',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/015',
                'tanggal_surat' => '2026-03-16',
                'perihal' => 'Evaluasi Kinerja Triwulan',
                'surat_masuk_id' => 8,
            ],
            
            // April 2026
            [
                'no_surat' => 'SK/2026/016',
                'tanggal_surat' => '2026-04-01',
                'perihal' => 'Pengumuman Rekrutmen Karyawan',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/017',
                'tanggal_surat' => '2026-04-04',
                'perihal' => 'Balasan Surat Penawaran Kerjasama',
                'surat_masuk_id' => 9,
            ],
            [
                'no_surat' => 'SK/2026/018',
                'tanggal_surat' => '2026-04-08',
                'perihal' => 'Pemberitahuan Pemutakhiran Data',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/019',
                'tanggal_surat' => '2026-04-11',
                'perihal' => 'Undang Rapat Evaluasi Proyek',
                'surat_masuk_id' => 10,
            ],
            [
                'no_surat' => 'SK/2026/020',
                'tanggal_surat' => '2026-04-15',
                'perihal' => 'Laporan Akhir Tahun Ajaran',
                'surat_masuk_id' => null,
            ],
            
            // May 2026
            [
                'no_surat' => 'SK/2026/021',
                'tanggal_surat' => '2026-05-03',
                'perihal' => 'Permohonan Rekomendasi',
                'surat_masuk_id' => 11,
            ],
            [
                'no_surat' => 'SK/2026/022',
                'tanggal_surat' => '2026-05-06',
                'perihal' => 'Konfirmasi Kehadiran Acara',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/023',
                'tanggal_surat' => '2026-05-10',
                'perihal' => 'Pengajuan Cuti Bersama',
                'surat_masuk_id' => 12,
            ],
            [
                'no_surat' => 'SK/2026/024',
                'tanggal_surat' => '2026-05-13',
                'perihal' => 'Pemberitahuan Perubahan Struktur Organisasi',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/025',
                'tanggal_surat' => '2026-05-17',
                'perihal' => 'Undangan Pelatihan Karyawan',
                'surat_masuk_id' => 13,
            ],
            
            // June 2026
            [
                'no_surat' => 'SK/2026/026',
                'tanggal_surat' => '2026-06-01',
                'perihal' => 'Laporan Keuangan Semester',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/027',
                'tanggal_surat' => '2026-06-04',
                'perihal' => 'Balasan Tawaran Kerjasama',
                'surat_masuk_id' => 14,
            ],
            [
                'no_surat' => 'SK/2026/028',
                'tanggal_surat' => '2026-06-08',
                'perihal' => 'Pemberitahuan Maintenance Sistem',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/029',
                'tanggal_surat' => '2026-06-11',
                'perihal' => 'Undangan Gathering Tahunan',
                'surat_masuk_id' => 15,
            ],
            [
                'no_surat' => 'SK/2026/030',
                'tanggal_surat' => '2026-06-15',
                'perihal' => 'Surat Keputusan Promosi Jabatan',
                'surat_masuk_id' => null,
            ],
            
            // July 2026
            [
                'no_surat' => 'SK/2026/031',
                'tanggal_surat' => '2026-07-02',
                'perihal' => 'Permohonan Perpanjangan Kontrak',
                'surat_masuk_id' => 16,
            ],
            [
                'no_surat' => 'SK/2026/032',
                'tanggal_surat' => '2026-07-05',
                'perihal' => 'Pemberitahuan Kenaikan Gaji',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/033',
                'tanggal_surat' => '2026-07-09',
                'perihal' => 'Undang Rapat Strategis',
                'surat_masuk_id' => 17,
            ],
            [
                'no_surat' => 'SK/2026/034',
                'tanggal_surat' => '2026-07-12',
                'perihal' => 'Laporan Kegiatan Sosial',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/035',
                'tanggal_surat' => '2026-07-16',
                'perihal' => 'Pengajuan Proyek Baru',
                'surat_masuk_id' => 18,
            ],
            
            // August 2026
            [
                'no_surat' => 'SK/2026/036',
                'tanggal_surat' => '2026-08-03',
                'perihal' => 'Peringatan HUT Kemerdekaan',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/037',
                'tanggal_surat' => '2026-08-06',
                'perihal' => 'Balasan Pengaduan Masyarakat',
                'surat_masuk_id' => 19,
            ],
            [
                'no_surat' => 'SK/2026/038',
                'tanggal_surat' => '2026-08-10',
                'perihal' => 'Pemberitahuan Audit Internal',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/039',
                'tanggal_surat' => '2026-08-13',
                'perihal' => 'Undangan Workshop Digitalisasi',
                'surat_masuk_id' => 20,
            ],
            [
                'no_surat' => 'SK/2026/040',
                'tanggal_surat' => '2026-08-17',
                'perihal' => 'Laporan Pelaksanaan Program',
                'surat_masuk_id' => null,
            ],
            
            // September 2026
            [
                'no_surat' => 'SK/2026/041',
                'tanggal_surat' => '2026-09-01',
                'perihal' => 'Permohonan Sertifikasi',
                'surat_masuk_id' => 21,
            ],
            [
                'no_surat' => 'SK/2026/042',
                'tanggal_surat' => '2026-09-04',
                'perihal' => 'Pemberitahuan Hari Besar Keagamaan',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/043',
                'tanggal_surat' => '2026-09-08',
                'perihal' => 'Undangan Seminar Nasional',
                'surat_masuk_id' => 22,
            ],
            [
                'no_surat' => 'SK/2026/044',
                'tanggal_surat' => '2026-09-11',
                'perihal' => 'Surat Edaran Kebijakan Baru',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/045',
                'tanggal_surat' => '2026-09-15',
                'perihal' => 'Evaluasi Kinerja Tahunan',
                'surat_masuk_id' => 23,
            ],
            
            // October 2026
            [
                'no_surat' => 'SK/2026/046',
                'tanggal_surat' => '2026-10-02',
                'perihal' => 'Pengumuman Beasiswa',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/047',
                'tanggal_surat' => '2026-10-05',
                'perihal' => 'Balasan Klaim Asuransi',
                'surat_masuk_id' => 24,
            ],
            [
                'no_surat' => 'SK/2026/048',
                'tanggal_surat' => '2026-10-09',
                'perihal' => 'Pemberitahuan Migrasi Server',
                'surat_masuk_id' => null,
            ],
            [
                'no_surat' => 'SK/2026/049',
                'tanggal_surat' => '2026-10-12',
                'perihal' => 'Undang Rapat Persiapan Tahun Baru',
                'surat_masuk_id' => 25,
            ],
            [
                'no_surat' => 'SK/2026/050',
                'tanggal_surat' => '2026-10-16',
                'perihal' => 'Laporan Tahunan Perusahaan',
                'surat_masuk_id' => null,
            ],
        ];

        foreach ($suratKeluarData as $data) {
            SuratKeluar::create($data);
        }
    }
}