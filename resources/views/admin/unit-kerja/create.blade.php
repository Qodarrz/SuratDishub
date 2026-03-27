<x-app-layout>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<div>
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Unit Kerja</h2>
				<p class="text-sm text-gray-500">Tambahkan unit kerja baru ke sistem.</p>
			</div>
			<a href="{{ route('unit-kerja.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-sm font-medium rounded-lg shadow-sm hover:bg-gray-50">
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

				<form action="{{ route('unit-kerja.store') }}" method="POST" class="space-y-5">
					@csrf

					<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
						<div class="space-y-1">
							<label for="nama" class="block text-sm font-medium text-gray-700">Nama Unit Kerja <span class="text-red-500">*</span></label>
							<input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required />
						</div>

						<div class="space-y-1">
							<label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
							<input type="text" name="kode" id="kode" value="{{ old('kode') }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="Contoh: KD" />
							<p class="text-xs text-gray-400">Kode singkat untuk identifikasi unit kerja.</p>
						</div>
					</div>

					<div class="space-y-1">
						<label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
						<textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="Jelaskan tugas dan fungsi unit kerja ini...">{{ old('deskripsi') }}</textarea>
					</div>

					<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
						<div class="space-y-1">
							<label for="urutan" class="block text-sm font-medium text-gray-700">Urutan</label>
							<input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}" min="0" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" />
							<p class="text-xs text-gray-400">Nomor urutan untuk sorting (0 = tertinggi).</p>
						</div>

						<div class="space-y-1">
							<label class="block text-sm font-medium text-gray-700">Status</label>
							<div class="mt-2">
								<label class="inline-flex items-center">
									<input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
									<span class="ml-2 text-sm text-gray-700">Aktif</span>
								</label>
								<p class="text-xs text-gray-400 mt-1">Centang untuk mengaktifkan unit kerja ini.</p>
							</div>
						</div>
					</div>

					<div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-200">
						<a href="{{ route('unit-kerja.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-sm font-medium rounded-lg shadow-sm hover:bg-gray-50">
							<span>Batal</span>
						</a>
						<button type="submit" class="inline-flex items-center gap-2 px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700">
							<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
							</svg>
							<span>Simpan</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>
