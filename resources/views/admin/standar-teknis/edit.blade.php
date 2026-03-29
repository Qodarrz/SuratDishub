<x-app-layout>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<div>
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Standar Teknis</h2>
				<p class="text-sm text-gray-500">Perbarui data dan file standar teknis.</p>
			</div>
			<a href="{{ route('standar-teknis.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-sm font-medium rounded-lg shadow-sm hover:bg-gray-50">
				<svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
				</svg>
				<span>Kembali</span>
			</a>
		</div>
	</x-slot>

	<div class="py-6">
		<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-6 space-y-6">
				@if ($errors->any())
					<div class="rounded-md bg-red-50 border border-red-200 p-4 text-sm text-red-700">
						<ul class="list-disc list-inside space-y-1">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ route('standar-teknis.update', $standarTeknis) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
					@csrf
					@method('PUT')

					<div class="space-y-1">
						<label for="no_surat" class="block text-sm font-medium text-gray-700">No Surat</label>
						<input type="text" name="no_surat" id="no_surat" value="{{ old('no_surat', $standarTeknis->no_surat) }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required />
					</div>

					<div class="space-y-1">
						<label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
						<input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat', $standarTeknis->tanggal_surat) }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required />
					</div>

					<div class="space-y-1">
						<label for="unit_kerja_id" class="block text-sm font-medium text-gray-700">Ditunjukkan</label>
						<input type="text" name="unit_kerja_id" id="unit_kerja_id" value="{{ old('unit_kerja_id', $standarTeknis->unit_kerja_id) }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" />
					</div>

					<div class="space-y-1">
						<label for="perihal" class="block text-sm font-medium text-gray-700">Perihal / Deskripsi</label>
						<textarea name="perihal" id="perihal" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>{{ old('perihal', $standarTeknis->perihal) }}</textarea>
					</div>

					<div class="space-y-1">
						<label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
						<textarea name="keterangan" id="keterangan" rows="2" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('keterangan', $standarTeknis->keterangan) }}</textarea>
						<p class="text-xs text-gray-400">Tambahkan keterangan tambahan jika diperlukan.</p>
					</div>

					<div class="space-y-1">
						<label for="file_pdf" class="block text-sm font-medium text-gray-700">File Dokumen / Gambar (opsional)</label>
						<input type="file" name="file_pdf" id="file_pdf" accept="application/pdf,image/*,.doc,.docx,.xls,.xlsx" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
						@if($standarTeknis->file_path)
							<p class="text-xs text-gray-400 mt-1">File saat ini: <a href="{{ route('standar-teknis.file', $standarTeknis) }}" target="_blank" class="text-indigo-600 hover:text-indigo-700">Lihat File</a></p>
						@endif
						<p class="text-xs text-gray-400">Jika tidak diubah, biarkan kosong. Format: PDF, PNG, JPG, Word, Excel.</p>
					</div>

					<div class="flex items-center justify-end gap-3 pt-3">
						<a href="{{ route('standar-teknis.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-sm font-medium rounded-lg shadow-sm hover:bg-gray-50">
							<span>Batal</span>
						</a>
						<button type="submit" class="inline-flex items-center gap-2 px-5 py-2 bg-cyan-600 text-white text-sm font-medium rounded-lg shadow hover:bg-cyan-700">
							<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
							</svg>
							<span>Update</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>
