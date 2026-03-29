<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\StandarTeknisController;
use App\Http\Controllers\UnitKerjaController;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
	$totalSuratMasuk = SuratMasuk::count();
	$totalSuratKeluar = SuratKeluar::count();
	$totalStandarTeknis = \App\Models\StandarTeknis::count(); // menghitung data standar teknis yang ada

	// statistik ringkas untuk kartu aksi di dashboard
	$suratMasukSudahDibaca = SuratMasuk::where('is_read', true)->count();
	$suratSelesaiDiproses = $totalSuratKeluar; // asumsi: surat keluar mewakili surat yang sudah diproses

	$newIncomingCount = 0;

	$year = now()->year;

	$suratMasukPerBulan = SuratMasuk::selectRaw('MONTH(tanggal_surat) as bulan, COUNT(*) as total')
		->whereYear('tanggal_surat', $year)
		->groupBy('bulan')
		->pluck('total', 'bulan');

	$suratKeluarPerBulan = SuratKeluar::selectRaw('MONTH(tanggal_surat) as bulan, COUNT(*) as total')
		->whereYear('tanggal_surat', $year)
		->groupBy('bulan')
		->pluck('total', 'bulan');

	$chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
	$chartMasuk = [];
	$chartKeluar = [];

	for ($i = 1; $i <= 12; $i++) {
		$chartMasuk[] = $suratMasukPerBulan[$i] ?? 0;
		$chartKeluar[] = $suratKeluarPerBulan[$i] ?? 0;
	}

	return view('dashboard', [
		'totalSuratMasuk' => $totalSuratMasuk,
		'totalSuratKeluar' => $totalSuratKeluar,
		'totalStandarTeknis' => $totalStandarTeknis,
		'newIncomingCount' => $newIncomingCount,
		'suratMasukSudahDibaca' => $suratMasukSudahDibaca,
		'suratSelesaiDiproses' => $suratSelesaiDiproses,
		'chartLabels' => $chartLabels,
		'chartMasuk' => $chartMasuk,
		'chartKeluar' => $chartKeluar,
		'chartYear' => $year,
	]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/pencarian', [App\Http\Controllers\PencarianController::class, 'index'])->name('pencarian.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('surat-masuk', SuratMasukController::class)->except(['show']);
    Route::get('surat-masuk/search', [SuratMasukController::class, 'search'])->name('surat-masuk.search');
    Route::resource('surat-keluar', SuratKeluarController::class)->except(['show']);
    Route::get('surat-keluar/search/surat-masuk', [SuratKeluarController::class, 'searchSuratMasuk'])->name('surat-keluar.search-surat-masuk');
    Route::resource('standar-teknis', StandarTeknisController::class)
        ->except(['show'])
        ->parameters(['standar-teknis' => 'standar_teknis']);
    Route::get('standar-teknis/{standar_teknis}/file', [StandarTeknisController::class, 'file'])
        ->name('standar-teknis.file');
});

require __DIR__.'/auth.php';
