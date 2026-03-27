<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->query('q');
        
        if (!$search) {
            return redirect()->route('dashboard');
        }

        // Cari di semua tabel
        $suratMasuk = \App\Models\SuratMasuk::where(function ($q) use ($search) {
            $q->where('no_surat', 'like', "%{$search}%")
                ->orWhere('perihal', 'like', "%{$search}%");
            try {
                $q->orWhereDate('tanggal_surat', $search);
            } catch (\Throwable $e) {
                // abaikan jika format tanggal tidak valid
            }
        })->get();

        $suratKeluar = \App\Models\SuratKeluar::where(function ($q) use ($search) {
            $q->where('no_surat', 'like', "%{$search}%")
                ->orWhere('perihal', 'like', "%{$search}%");
            try {
                $q->orWhereDate('tanggal_surat', $search);
            } catch (\Throwable $e) {
                // abaikan jika format tanggal tidak valid
            }
        })->get();

        $standarTeknis = \App\Models\StandarTeknis::where(function ($q) use ($search) {
            $q->where('no_surat', 'like', "%{$search}%")
                ->orWhere('perihal', 'like', "%{$search}%")
                ->orWhere('keterangan', 'like', "%{$search}%")
                ->orWhere('unit_kerja_id', 'like', "%{$search}%");
            try {
                $q->orWhereDate('tanggal_surat', $search);
            } catch (\Throwable $e) {
                // abaikan jika format tanggal tidak valid
            }
        })->get();

        // Prioritaskan redirect berdasarkan hasil yang ditemukan
        if ($suratMasuk->count() > 0) {
            return redirect()->route('surat-masuk.index', ['q' => $search]);
        } elseif ($suratKeluar->count() > 0) {
            return redirect()->route('surat-keluar.index', ['q' => $search]);
        } elseif ($standarTeknis->count() > 0) {
            return redirect()->route('standar-teknis.index', ['q' => $search]);
        } else {
            // Jika tidak ada hasil, redirect ke surat-masuk dengan pesan
            return redirect()->route('surat-masuk.index', ['q' => $search]);
        }
    }

    public function index(Request $request)
    {
        $query = SuratMasuk::query()->latest();

        $search = $request->query('q');
        
        // Debug: Tampilkan nilai search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('no_surat', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
                try {
                    $q->orWhereDate('tanggal_surat', $search);
                } catch (\Throwable $e) {
                    // abaikan jika format tanggal tidak valid
                }
            });
        }

        $suratMasuk = $query->paginate(10)->withQueryString();

        SuratMasuk::where('is_read', false)->update(['is_read' => true]);

        return view('admin.surat-masuk', compact('suratMasuk', 'search'));
    }

    public function create()
    {
        return view('admin.surat-masuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_surat' => 'required|string|max:255|unique:surat_masuk,no_surat',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'divisi' => 'required|in:Daltib,Manrek,Parkir,TL',
        ]);

        $validated['is_read'] = false;

        SuratMasuk::create($validated);

        return redirect()->route('surat-masuk.index')->with('status', 'Surat masuk berhasil ditambahkan.');
    }

    public function edit(SuratMasuk $surat_masuk)
    {
        return view('admin.surat-masuk.edit', [
            'suratMasuk' => $surat_masuk,
        ]);
    }

    public function update(Request $request, SuratMasuk $surat_masuk)
    {
        $validated = $request->validate([
            'no_surat' => 'required|string|max:255|unique:surat_masuk,no_surat,' . $surat_masuk->id,
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'divisi' => 'required|in:Daltib,Manrek,Parkir,TL',
        ]);

        $surat_masuk->update($validated);

        return redirect()->route('surat-masuk.index')->with('status', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy(SuratMasuk $surat_masuk)
    {
        $surat_masuk->delete();

        return redirect()->route('surat-masuk.index')->with('status', 'Surat masuk berhasil dihapus.');
    }
}
