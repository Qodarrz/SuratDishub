<x-app-layout>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<div>
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Surat Keluar</h2>
				<p class="text-sm text-gray-500">Isi data surat keluar dengan lengkap.</p>
			</div>
			<a href="{{ route('surat-keluar.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-sm font-medium rounded-lg shadow-sm hover:bg-gray-50">
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

				<form action="{{ route('surat-keluar.store') }}" method="POST" class="space-y-5">
					@csrf

					<div class="space-y-1">
						<label for="surat_masuk_id" class="sr-only">Terkait Surat Masuk (Cari & Pilih)</label>
						<input type="hidden" name="surat_masuk_id" id="surat_masuk_id_hidden" value="{{ old('surat_masuk_id') }}" />
						<input type="text" id="surat_masuk_search" placeholder="Cari no surat atau perihal..." class="hidden mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm px-3 py-2" aria-hidden="true" />
						<div id="surat_masuk_results" class="mt-2 border border-gray-300 rounded-lg max-h-64 overflow-y-auto hidden" aria-hidden="true">
							<!-- Hasil pencarian (disembunyikan) -->
						</div>
						<p class="text-xs text-gray-400 mt-2 hidden">Pilih surat masuk yang akan ditandai selesai diproses (opsional).</p>
						<div id="surat_masuk_selected" class="mt-2 p-3 bg-blue-50 rounded-lg hidden" aria-hidden="true">
							<p class="text-sm text-blue-800"><strong>Dipilih:</strong> <span id="selected_text"></span></p>
						</div>
					</div>

					<div class="space-y-1">
						<label for="no_surat" class="block text-sm font-medium text-gray-700">No Surat</label>
						<input type="text" name="no_surat" id="no_surat" value="{{ old('no_surat') }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required />
					</div>

					<div class="space-y-1">
						<label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
						<input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required />
					</div>

					<div class="space-y-1">
						<label for="perihal" class="block text-sm font-medium text-gray-700">Perihal / Deskripsi</label>
						<textarea name="perihal" id="perihal" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>{{ old('perihal') }}</textarea>
					</div>

					<div class="flex items-center justify-end gap-3 pt-3">
						<a href="{{ route('surat-keluar.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-sm font-medium rounded-lg shadow-sm hover:bg-gray-50">
							<span>Batal</span>
						</a>
						<button type="submit" class="inline-flex items-center gap-2 px-5 py-2 bg-cyan-600 text-white text-sm font-medium rounded-lg shadow hover:bg-cyan-700">
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

	<script>
		const searchInput = document.getElementById('surat_masuk_search');
		const resultsDiv = document.getElementById('surat_masuk_results');
		const hiddenInput = document.getElementById('surat_masuk_id_hidden');
		const selectedDiv = document.getElementById('surat_masuk_selected');
		const selectedText = document.getElementById('selected_text');

		let debounceTimer;

		searchInput.addEventListener('input', function() {
			clearTimeout(debounceTimer);
			const query = this.value.trim();

			if (query.length < 1) {
				resultsDiv.classList.add('hidden');
				return;
			}

			debounceTimer = setTimeout(async () => {
				try {
					const response = await fetch(`{{ route('surat-keluar.search-surat-masuk') }}?q=${encodeURIComponent(query)}`);
					const data = await response.json();

					if (data.results.length === 0) {
						resultsDiv.innerHTML = '<div class="p-3 text-gray-500 text-sm">Tidak ada hasil ditemukan</div>';
						resultsDiv.classList.remove('hidden');
						return;
					}

					resultsDiv.innerHTML = data.results.map(item => `
						<div class="p-3 cursor-pointer hover:bg-indigo-50 border-b border-gray-200 last:border-b-0" onclick="selectSuratMasuk(${item.id}, '${item.text}')">
							<p class="font-semibold text-sm text-gray-800">${item.no_surat}</p>
							<p class="text-xs text-gray-600">${item.perihal}</p>
							<p class="text-xs text-gray-400">Tanggal: ${new Date(item.tanggal_surat).toLocaleDateString('id-ID')}</p>
						</div>
					`).join('');
					resultsDiv.classList.remove('hidden');
				} catch (error) {
					console.error('Error:', error);
				}
			}, 300);
		});

		function selectSuratMasuk(id, text) {
			hiddenInput.value = id;
			searchInput.value = '';
			resultsDiv.classList.add('hidden');
			selectedText.textContent = text;
			selectedDiv.classList.remove('hidden');
		}

		// Clear selection
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') {
				resultsDiv.classList.add('hidden');
			}
		});

		// Close results when clicking outside
		document.addEventListener('click', function(e) {
			if (!e.target.closest('#surat_masuk_search') && !e.target.closest('#surat_masuk_results')) {
				resultsDiv.classList.add('hidden');
			}
		});
	</script>
</x-app-layout>
