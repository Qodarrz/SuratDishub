<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\StandarTeknis;

class PencarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        $suratMasuk = collect();
        $suratKeluar = collect();
        $standarTeknis = collect();

        if ($query) {
            $suratMasuk = SuratMasuk::where('no_surat', 'like', "%{$query}%")
                ->orWhere('tanggal_surat', 'like', "%{$query}%")
                ->orWhere('perihal', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();

            $suratKeluar = SuratKeluar::where('no_surat', 'like', "%{$query}%")
                ->orWhere('tanggal_surat', 'like', "%{$query}%")
                ->orWhere('perihal', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();

            $standarTeknis = StandarTeknis::where('no_surat', 'like', "%{$query}%")
                ->orWhere('tanggal_surat', 'like', "%{$query}%")
                ->orWhere('perihal', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.pencarian.index', compact('query', 'suratMasuk', 'suratKeluar', 'standarTeknis'));
    }
}
