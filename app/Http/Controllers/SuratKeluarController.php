<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratKeluar::query()->latest();

        $search = $request->query('q');
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

        $suratKeluar = $query->paginate(10)->withQueryString();

        return view('admin.surat-keluar', compact('suratKeluar', 'search'));
    }

    public function create()
    {
        return view('admin.surat-keluar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_surat' => 'required|string|max:255|unique:surat_keluar,no_surat',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'surat_masuk_id' => 'nullable|exists:surat_masuk,id',
        ]);

        $suratKeluar = SuratKeluar::create($validated);

        // Update status surat masuk menjadi selesai
        if ($validated['surat_masuk_id']) {
            SuratMasuk::find($validated['surat_masuk_id'])->update(['status' => 'selesai']);
        }

        return redirect()->route('surat-keluar.index')->with('status', 'Surat keluar berhasil ditambahkan.');
    }

    public function edit(SuratKeluar $surat_keluar)
    {
        return view('admin.surat-keluar.edit', [
            'suratKeluar' => $surat_keluar,
        ]);
    }

    public function update(Request $request, SuratKeluar $surat_keluar)
    {
        $validated = $request->validate([
            'no_surat' => 'required|string|max:255|unique:surat_keluar,no_surat,' . $surat_keluar->id,
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'surat_masuk_id' => 'nullable|exists:surat_masuk,id',
        ]);

        // Jika surat masuk id berubah, update status surat masuk lama dan baru
        if ($surat_keluar->surat_masuk_id != $validated['surat_masuk_id']) {
            // Reset status surat masuk lama menjadi masuk
            if ($surat_keluar->surat_masuk_id) {
                SuratMasuk::find($surat_keluar->surat_masuk_id)->update(['status' => 'masuk']);
            }

            // Update status surat masuk baru menjadi selesai
            if ($validated['surat_masuk_id']) {
                SuratMasuk::find($validated['surat_masuk_id'])->update(['status' => 'selesai']);
            }
        }

        $surat_keluar->update($validated);

        return redirect()->route('surat-keluar.index')->with('status', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy(SuratKeluar $surat_keluar)
    {
        // Reset status surat masuk menjadi masuk jika ada
        if ($surat_keluar->surat_masuk_id) {
            SuratMasuk::find($surat_keluar->surat_masuk_id)->update(['status' => 'masuk']);
        }

        $surat_keluar->delete();

        return redirect()->route('surat-keluar.index')->with('status', 'Surat keluar berhasil dihapus.');
    }

    public function searchSuratMasuk(Request $request)
    {
        $search = $request->query('q', '');

        $suratMasuk = SuratMasuk::whereIn('status', ['masuk', 'sedang_diproses'])
            ->where(function ($query) use ($search) {
                $query->where('no_surat', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get(['id', 'no_surat', 'perihal', 'tanggal_surat'])
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->no_surat . ' - ' . $item->perihal,
                    'no_surat' => $item->no_surat,
                    'perihal' => $item->perihal,
                    'tanggal_surat' => $item->tanggal_surat,
                ];
            });

        return response()->json(['results' => $suratMasuk]);
    }
}
