<x-app-layout>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<div>
				<h2 class="font-semibold text-xl text-gray-800 leading-tight">Unit Kerja</h2>
				<p class="text-sm text-gray-500">Kelola daftar unit kerja Dinas Perhubungan.</p>
			</div>
			<a href="{{ route('unit-kerja.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700">
				<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
				</svg>
				<span>Tambah Unit Kerja</span>
			</a>
		</div>
	</x-slot>

	<div class="py-6">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<!-- Search -->
			<div class="bg-white shadow-sm rounded-xl border border-gray-100 p-4 mb-6">
				<form method="GET" action="{{ route('unit-kerja.index') }}" class="flex gap-4">
					<div class="flex-1">
						<input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Cari nama, kode, atau deskripsi unit kerja..." 
							   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
					</div>
					<button type="submit" class="px-6 py-2 bg-gray-800 text-white text-sm font-medium rounded-lg hover:bg-gray-900">
						Cari
					</button>
				</form>
			</div>

			<!-- Table -->
			<div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">
				<div class="overflow-x-auto">
					<table class="min-w-full divide-y divide-gray-200 text-sm">
						<thead class="bg-gray-50">
							<tr>
								<th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
								<th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kode</th>
								<th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Unit Kerja</th>
								<th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Deskripsi</th>
								<th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
								<th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-100">
							@if($unitKerja->count() > 0)
								@foreach($unitKerja as $index => $item)
									<tr class="hover:bg-gray-50">
										<td class="px-4 py-3 text-gray-700">{{ $unitKerja->firstItem() + $index }}</td>
										<td class="px-4 py-3 text-gray-700">
											@if($item->kode)
												<span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">
													{{ $item->kode }}
												</span>
											@else
												<span class="text-gray-400">-</span>
											@endif
										</td>
										<td class="px-4 py-3 text-gray-700 font-medium">{{ $item->nama }}</td>
										<td class="px-4 py-3 text-gray-700">
											<div class="max-w-xs truncate" title="{{ $item->deskripsi ?? '-' }}">
												{{ $item->deskripsi ?? '-' }}
											</div>
										</td>
										<td class="px-4 py-3 text-center">
											<form action="{{ route('unit-kerja.toggle-status', $item) }}" method="POST">
												@csrf
												@method('PATCH')
												<button type="submit" class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }} transition-colors">
													<span class="w-1.5 h-1.5 rounded-full {{ $item->is_active ? 'bg-green-400' : 'bg-red-400' }}"></span>
													{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
												</button>
											</form>
										</td>
										<td class="px-4 py-3 text-center">
											<div class="flex items-center justify-center gap-2">
												<a href="{{ route('unit-kerja.edit', $item) }}" 
												   class="text-indigo-600 hover:text-indigo-900" title="Edit">
													<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
													</svg>
												</a>
												<form action="{{ route('unit-kerja.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus unit kerja ini?')">
													@csrf
													@method('DELETE')
													<button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
														<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
														</svg>
													</button>
												</form>
											</div>
										</td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="6" class="px-4 py-8 text-center text-gray-500">
										<svg class="mx-auto h-12 w-12 text-gray-400 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
										</svg>
										<p class="text-sm">Belum ada data unit kerja.</p>
										<a href="{{ route('unit-kerja.create') }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium mt-2 inline-block">
											Tambah unit kerja
										</a>
									</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>

				<!-- Pagination -->
				@if($unitKerja->hasPages())
					<div class="px-4 py-3 border-t border-gray-200">
						{{ $unitKerja->links() }}
					</div>
				@endif
			</div>
		</div>
	</div>
</x-app-layout>
