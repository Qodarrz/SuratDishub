<?php

namespace App\Http\Controllers;

use App\Models\StandarTeknis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cloudinary\Cloudinary;

class StandarTeknisController extends Controller

{   
    public function index(Request $request)
    {
        $query = StandarTeknis::latest();

        $search = $request->query('q');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('no_surat', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%");
                try {
                    $q->orWhereDate('tanggal_surat', $search);
                } catch (\Throwable $e) {
                }
            });
        }

        $standarTeknis = $query->paginate(10)->withQueryString();

        return view('admin.standar-teknis.index', compact('standarTeknis', 'search'));
    }

    public function create()
    {
        return view('admin.standar-teknis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'keterangan' => 'nullable|string',
            'unit_kerja_id' => 'nullable|string|max:255',
            'file_pdf' => 'required|file|mimes:pdf|max:4096',
        ]);

$cloudinary = new Cloudinary();

$uploadedFile = $cloudinary->uploadApi()->upload(
    $request->file('file_pdf')->getRealPath(),
    [
        'folder' => 'standar-teknis',
        'resource_type' => 'raw'
    ]
);

$path = $uploadedFile['secure_url'];
$publicId = $uploadedFile['public_id'];

        StandarTeknis::create([
            'no_surat' => $validated['no_surat'],
            'tanggal_surat' => $validated['tanggal_surat'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
            'unit_kerja_id' => $validated['unit_kerja_id'],
            'file_path' => $path,
            'cloudinary_public_id' => $publicId,
        ]);

        return redirect()->route('standar-teknis.index')->with('status', 'Standar teknis berhasil ditambahkan.');
    }

    public function edit(StandarTeknis $standar_teknis)
    {
        return view('admin.standar-teknis.edit', [
            'standarTeknis' => $standar_teknis,
        ]);
    }

    public function update(Request $request, StandarTeknis $standar_teknis)
    {
        $validated = $request->validate([
            'no_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'keterangan' => 'nullable|string',
            'unit_kerja_id' => 'nullable|string|max:255',
            'file_pdf' => 'nullable|file|mimes:pdf|max:4096',
        ]);

        $data = [
            'no_surat' => $validated['no_surat'],
            'tanggal_surat' => $validated['tanggal_surat'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
            'unit_kerja_id' => $validated['unit_kerja_id'],
        ];
        if ($request->hasFile('file_pdf')) {

            if ($standar_teknis->cloudinary_public_id) {
                Cloudinary::destroy($standar_teknis->cloudinary_public_id, [
                    'resource_type' => 'raw'
                ]);
            }

            $uploadedFile = Cloudinary::upload(
                $request->file('file_pdf')->getRealPath(),
                [
                    'folder' => 'standar-teknis',
                    'resource_type' => 'raw'
                ]
            );

            $data['file_path'] = $uploadedFile->getSecurePath();
            $data['cloudinary_public_id'] = $uploadedFile->getPublicId();
        }

        $standar_teknis->update($data);

        return redirect()->route('standar-teknis.index')->with('status', 'Standar teknis berhasil diperbarui.');
    }

    public function destroy(StandarTeknis $standar_teknis)
    {
        if ($standar_teknis->cloudinary_public_id) {
            Cloudinary::destroy($standar_teknis->cloudinary_public_id, [
                'resource_type' => 'raw'
            ]);
        }

        $standar_teknis->delete();

        return redirect()->route('standar-teknis.index')->with('status', 'Standar teknis berhasil dihapus.');
    }

    public function file(StandarTeknis $standar_teknis)
    {
        if (!$standar_teknis->file_path) {
            abort(404);
        }

        return redirect()->away($standar_teknis->file_path);
    }
}
