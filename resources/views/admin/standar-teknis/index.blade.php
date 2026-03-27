<x-app-layout>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<div>
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">Standar Teknis</h2>
				<p class="text-sm text-gray-500">Daftar dokumen standar teknis dalam bentuk PDF.</p>
			</div>
			<div class="flex items-center gap-2">
				<a href="{{ route('standar-teknis.create') }}"
					class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700">
					<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
						stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
					</svg>
					<span>Tambah Standar Teknis</span>
				</a>
				<form method="GET" action="{{ route('standar-teknis.index') }}" class="flex items-center gap-2">
					<div class="relative">
						<span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
							<svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
									d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
							</svg>
						</span>
						<input type="text" name="q" value="{{ $search ?? '' }}"
							placeholder="Cari no / tanggal / perihal / keterangan"
							class="pl-9 pr-10 py-2 w-52 rounded-lg border border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
						<button type="submit"
							class="absolute right-0 top-0 mt-1 mr-1 inline-flex items-center gap-1 px-3 py-1 bg-indigo-50 text-indigo-600 text-xs rounded-lg hover:bg-indigo-100">Cari</button>
					</div>
				</form>
			</div>
		</div>
	</x-slot>

	<div class="py-6">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			@if($search)
				<div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
					<div class="flex items-center">
						<svg class="h-4 w-4 text-blue-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
								d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
						</svg>
						<span class="text-sm text-blue-800">
							Menampilkan <strong>{{ $standarTeknis->total() }}</strong> hasil untuk pencarian
							"<strong>{{ $search }}</strong>"
						</span>
						<a href="{{ route('standar-teknis.index') }}"
							class="ml-auto text-xs text-blue-600 hover:text-blue-800">Clear</a>
					</div>
				</div>
			@endif
			<div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">
				<div class="overflow-x-auto">
					<table class="min-w-full divide-y divide-gray-200 text-sm">
						<thead class="bg-gray-50">
							<tr>
								<th
									class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
									No</th>
								<th
									class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
									No Surat</th>
								<th
									class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
									Tanggal Surat</th>
								<th
									class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
									Ditunjukkan</th>
								<th
									class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
									Perihal (Deskripsi)</th>
								<th
									class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
									Keterangan</th>
								<th
									class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
									File PDF</th>
								<th
									class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
									Aksi</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-100">
							@forelse($standarTeknis as $index => $item)
								@if($search && (stripos($item->no_surat, $search) !== false || stripos($item->perihal, $search) !== false || stripos($item->keterangan, $search) !== false))
									<tr class="bg-yellow-50 border-l-4 border-yellow-400">
								@else
										<tr>
									@endif
									<td class="px-4 py-3 text-gray-700">{{ $standarTeknis->firstItem() + $index }}</td>
									<td class="px-4 py-3 text-gray-700 font-semibold">
										@if($search && stripos($item->no_surat, $search) !== false)
											{!! str_replace($search, '<span class="bg-yellow-200 px-1 rounded">' . $search . '</span>', $item->no_surat) !!}
										@else
											{{ $item->no_surat }}
										@endif
									</td>
									<td class="px-4 py-3 text-gray-700">
										{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}
									</td>
									<td class="px-4 py-3 text-gray-700">{{ $item->unit_kerja_id ?? '-' }}</td>
									<td class="px-4 py-3 text-gray-700">
										@if($search && stripos($item->perihal, $search) !== false)
											{!! str_replace($search, '<span class="bg-yellow-200 px-1 rounded">' . $search . '</span>', $item->perihal) !!}
										@else
											{{ $item->perihal }}
										@endif
									</td>
									<td class="px-4 py-3 text-gray-700">
										@if($search && stripos($item->keterangan, $search) !== false)
											{!! str_replace($search, '<span class="bg-yellow-200 px-1 rounded">' . $search . '</span>', $item->keterangan) !!}
										@else
											{{ $item->keterangan ?? '-' }}
										@endif
									</td>
									<td class="px-4 py-3 text-gray-700">
										@if($item->file_path)
											<a href="{{ route('standar-teknis.file', $item) }}" target="_blank"
												class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-700 text-xs">
												<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
													viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
														d="M12 5v10m0 0l-3.5-3.5M12 15l3.5-3.5M5 19h14" />
												</svg>
												<span>Unduh / Lihat</span>
											</a>
										@else
											<span class="text-xs text-gray-400">Tidak ada file</span>
										@endif
									</td>
									<td class="px-4 py-3 text-right text-gray-700">
										<div class="inline-flex items-center gap-2">
											<a href="{{ route('standar-teknis.edit', $item) }}"
												class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-indigo-50 text-indigo-600 hover:bg-indigo-100">
												<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
													viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
														d="M15.232 5.232l3.536 3.536M4 20h4.5L19.768 8.732a1.5 1.5 0 000-2.121l-2.379-2.379a1.5 1.5 0 00-2.121 0L4 15.5V20z" />
												</svg>
											</a>
											<form action="{{ route('standar-teknis.destroy', $item) }}" method="POST"
												onsubmit="return confirm('Hapus standar teknis ini?');">
												@csrf
												@method('DELETE')
												<button type="submit"
													class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-red-50 text-red-600 hover:bg-red-100">
													<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
														viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round"
															stroke-width="1.5"
															d="M6 7h12M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2m-1 0v10a2 2 0 01-2 2H9a2 2 0 01-2-2V7h10z" />
													</svg>
												</button>
											</form>
										</div>
									</td>
								</tr>
							@empty
								@if($search)
									<tr>
										<td colspan="8" class="px-4 py-6 text-center text-gray-500">
											<svg class="h-8 w-8 mx-auto mb-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
												fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
													d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
											</svg>
											Tidak ada hasil untuk "<span class="font-semibold">{{ $search }}</span>"
										</td>
									</tr>
								@else
									<tr>
										<td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada data standar
											teknis.</td>
									</tr>
								@endif
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			<div class="mt-4">
				{{ $standarTeknis->links() }}
			</div>
		</div>
	</div>
</x-app-layout>