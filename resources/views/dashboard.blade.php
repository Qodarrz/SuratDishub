<x-app-layout>
	<x-slot name="header">
		<div class="flex flex-col gap-4">
			<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
				<div>
					<h2 class="text-2xl font-bold text-gray-900">Dashboard</h2>
					<p class="text-sm text-gray-500">Kelola data surat masuk, surat keluar, dan standar teknis dengan mudah.</p>
				</div>
				<a href="{{ route('surat-masuk.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-600 text-white text-sm font-medium shadow hover:bg-indigo-700">
					<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5" />
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 19a2 2 0 11-4 0" />
					</svg>
					<span>Notifikasi Surat Masuk</span>
					@if(($newIncomingCount ?? 0) > 0)
						<span class="ml-1 inline-flex items-center justify-center min-w-[1.5rem] px-1 text-xs font-semibold rounded-full bg-white text-indigo-700">
							{{ $newIncomingCount ?? 0 }}
						</span>
					@endif
				</a>
			</div>
		</div>
	</x-slot>

	<div class="py-6">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
			<div class="relative overflow-hidden rounded-3xl bg-indigo-600 text-white shadow-lg">
				<div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top_left,_#ffffff,_transparent_50%),_radial-gradient(circle_at_bottom_right,_#22c55e,_transparent_55%)]"></div>
				<div class="relative px-8 py-8 sm:px-10 sm:py-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
					<div>
						<p class="text-sm font-medium mb-2">Admin Panel Surat</p>
						<h1 class="text-2xl sm:text-3xl font-bold mb-2">Selamat Datang, Admin!</h1>
						<p class="text-sm sm:text-base text-indigo-100 max-w-xl">Pantau statistik surat masuk, surat keluar, dan standar teknis setiap bulan maupun setiap tahun secara cepat dan efisien.</p>
					</div>
					<div class="flex items-center gap-4">
						<div class="h-16 w-16 sm:h-20 sm:w-20 rounded-2xl bg-white/10 flex items-center justify-center">
							<svg class="h-10 w-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 19h16M4 15l4-6 4 4 4-7 4 9" />
							</svg>
						</div>
					</div>
				</div>
			</div>

			<div class="flex items-center justify-end mt-4">
				<form action="{{ route('pencarian.index') }}" method="GET" class="flex items-center gap-2" onsubmit="return handleSearch(event)">
					<input type="text" name="q" id="searchInput" placeholder="Cari nomor surat..." 
						class="px-4 py-2 rounded-full border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent w-64"
						value="{{ request('q') }}">
					<button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-600 text-white text-sm font-medium shadow hover:bg-cyan-700 transition-colors">
						<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
						</svg>
						<span>Cari</span>
					</button>
				</form>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
				<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col gap-4">
					<div class="flex items-center justify-between">
						<div>
							<p class="text-xs font-semibold text-indigo-600 uppercase tracking-wide">Total</p>
							<h3 class="mt-1 text-lg font-bold text-gray-900">Surat Masuk</h3>
						</div>
						<div class="h-10 w-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
							<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 6.75h16.5M4 12h10.5M4 17.25h7" />
							</svg>
						</div>
					</div>
					<div class="flex items-end justify-between">
						<p class="text-3xl font-bold text-gray-900">{{ $totalSuratMasuk ?? 0 }}</p>
						<p class="text-xs text-gray-500">Data surat masuk tercatat.</p>
					</div>
				</div>

				<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col gap-4">
					<div class="flex items-center justify-between">
						<div>
							<p class="text-xs font-semibold text-emerald-600 uppercase tracking-wide">Total</p>
							<h3 class="mt-1 text-lg font-bold text-gray-900">Surat Keluar</h3>
						</div>
						<div class="h-10 w-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
							<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4.5 18.25h15" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M7 15V8.75a1.25 1.25 0 011.25-1.25H11m3 0h2.75A1.25 1.25 0 0118 8.75V15" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M11 15V6.75A1.25 1.25 0 0112.25 5.5H13" />
							</svg>
						</div>
					</div>
					<div class="flex items-end justify-between">
						<p class="text-3xl font-bold text-gray-900">{{ $totalSuratKeluar ?? 0 }}</p>
						<p class="text-xs text-gray-500">Data surat keluar tercatat.</p>
					</div>
				</div>

				<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col gap-4">
					<div class="flex items-center justify-between">
						<div>
							<p class="text-xs font-semibold text-fuchsia-600 uppercase tracking-wide">Total</p>
							<h3 class="mt-1 text-lg font-bold text-gray-900">Standar Teknis</h3>
						</div>
						<div class="h-10 w-10 rounded-xl bg-fuchsia-50 text-fuchsia-600 flex items-center justify-center">
							<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M6 7.25h12M6 11.5h6.5M6 15.75h9" />
								<rect x="4" y="5.5" width="16" height="13" rx="2" ry="2" stroke-width="1.7" />
							</svg>
						</div>
					</div>
					<div class="flex items-end justify-between">
						<p class="text-3xl font-bold text-gray-900">{{ $totalStandarTeknis ?? 0 }}</p>
						<p class="text-xs text-gray-500">Dokumen standar teknis tersedia.</p>
					</div>
				</div>
			</div>

			{{-- Kartu status ringkas untuk membantu prioritas kerja admin --}}
			<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
				<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col gap-4">
					<div class="flex items-start justify-between">
						<div>
							<p class="text-xs font-semibold text-blue-600 uppercase tracking-wide">Status</p>
							<h3 class="text-sm font-semibold text-gray-900 leading-tight">Menunggu Tindak Lanjut</h3>
						</div>
						<div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">
							<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 6v6l3 3" />
								<circle cx="12" cy="12" r="8" stroke-width="1.7" />
							</svg>
						</div>
					</div>
					<div class="flex flex-col gap-1">
						<p class="text-3xl font-bold text-gray-900">{{ $suratMasukSudahDibaca ?? 0 }}</p>
						<p class="text-xs text-gray-500">Surat baru diinput dan belum diproses.</p>
					</div>
					<div class="mt-1 flex justify-start">
						<a href="{{ route('surat-masuk.index') }}" class="inline-flex items-center text-xs font-medium text-blue-600 hover:text-blue-700">
							<span>Tindak lanjuti sekarang</span>
							<svg class="ml-1 h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
							</svg>
						</a>
					</div>
				</div>

				<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col gap-4">
					<div class="flex items-start justify-between">
						<div>
							<p class="text-xs font-semibold text-emerald-600 uppercase tracking-wide">Status</p>
							<h3 class="text-sm font-semibold text-gray-900 leading-tight">Selesai Diproses</h3>
						</div>
						<div class="h-10 w-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0">
							<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 13l4 4L19 7" />
							</svg>
						</div>
					</div>
					<div class="flex flex-col gap-1">
						<p class="text-3xl font-bold text-gray-900">{{ $suratSelesaiDiproses ?? 0 }}</p>
						<p class="text-xs text-gray-500">Surat telah ditindaklanjuti melalui pembuatan surat keluar.</p>
					</div>
					<div class="mt-1 flex justify-start">
						<a href="{{ route('surat-keluar.index') }}" class="inline-flex items-center text-xs font-medium text-emerald-600 hover:text-emerald-700">
							<span>Lihat surat selesai</span>
							<svg class="ml-1 h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
							</svg>
						</a>
					</div>
				</div>
			</div>

			<div class="py-2">
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
					<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
						<div class="flex items-center justify-between mb-4">
							<div>
								<h3 class="text-lg font-bold text-gray-900">Statistik Surat per Bulan</h3>
								<p class="text-xs text-gray-500">Perbandingan jumlah surat masuk dan surat keluar tahun {{ $chartYear ?? now()->year }}. Grafik ini bersifat informatif dan tidak dapat diklik.</p>
							</div>
						</div>
						<div class="h-72">
							<canvas id="suratBarChart"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@push('scripts')
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
				const canvas = document.getElementById('suratBarChart');
				if (!canvas) return;

				const ctx = canvas.getContext('2d');
				const labels = @json($chartLabels ?? []);
				const dataMasuk = @json($chartMasuk ?? []);
				const dataKeluar = @json($chartKeluar ?? []);

				new Chart(ctx, {
					type: 'bar',
					data: {
						labels: labels,
						datasets: [
							{
								label: 'Surat Masuk',
								data: dataMasuk,
								backgroundColor: 'rgba(79, 70, 229, 0.8)',
								borderRadius: 6,
								maxBarThickness: 28,
							},
							{
								label: 'Surat Keluar',
								data: dataKeluar,
								backgroundColor: 'rgba(16, 185, 129, 0.8)',
								borderRadius: 6,
								maxBarThickness: 28,
							},
						],
					},
					options: {
						responsive: true,
						maintainAspectRatio: false,
						plugins: {
							legend: {
								display: true,
								labels: {
									boxWidth: 12,
									usePointStyle: true,
									pointStyle: 'round',
								},
							},
							tooltip: {
								enabled: true,
							},
						},
						scales: {
							x: {
								grid: { display: false },
							},
							y: {
								beginAtZero: true,
								ticks: { precision: 0 },
							},
						},
					},
				});
			});

			// Function untuk handle pencarian dari dashboard
			function handleSearch(event) {
				event.preventDefault();
				const form = event.target;
				const formData = new FormData(form);
				const searchValue = formData.get('q');
				
				console.log('Search value:', searchValue); // Debug
				
				if (searchValue && searchValue.trim()) {
					const url = `{{ route('pencarian.index') }}?q=${encodeURIComponent(searchValue.trim())}`;
					console.log('Redirecting to:', url); // Debug
					window.location.href = url;
				} else {
					console.log('Redirecting to:', '{{ route('dashboard') }}'); // Debug
					window.location.href = '{{ route('dashboard') }}';
				}
				return false;
			}

			// Tambahan: Handle Enter key di input field
			document.addEventListener('DOMContentLoaded', function() {
				const searchInput = document.getElementById('searchInput');
				const searchForm = searchInput ? searchInput.closest('form') : null;
				
				if (searchInput) {
					// Handle Enter key
					searchInput.addEventListener('keypress', function(e) {
						if (e.key === 'Enter') {
							e.preventDefault();
							performSearch();
						}
					});
				}
				
				if (searchForm) {
					// Handle tombol submit
					searchForm.addEventListener('submit', function(e) {
						e.preventDefault();
						performSearch();
					});
				}
				
				// Function pencarian terpisah
				function performSearch() {
					const searchValue = searchInput.value.trim();
					console.log('Performing search for:', searchValue);
					
					if (searchValue) {
						const url = `{{ route('pencarian.index') }}?q=${encodeURIComponent(searchValue)}`;
						console.log('Going to:', url);
						window.location.href = url;
					} else {
						console.log('Going to:', '{{ route('dashboard') }}');
						window.location.href = '{{ route('dashboard') }}';
					}
				}
			});
		</script>
	@endpush

</x-app-layout>
