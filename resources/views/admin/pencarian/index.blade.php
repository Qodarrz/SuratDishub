<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Pencarian') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            @if($query)
                <div class="mb-4 p-4 bg-sky-50 border border-sky-200 rounded-xl flex items-center gap-3">
                    <svg class="h-5 w-5 text-sky-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
                    </svg>
                    <span class="text-sm text-sky-800">
                        Menampilkan hasil pencarian untuk "<strong>{{ $query }}</strong>" 
                        (Total: {{ $suratMasuk->count() + $suratKeluar->count() + $standarTeknis->count() }} data)
                    </span>
                    <a href="{{ route('dashboard') }}" class="ml-auto text-xs font-medium text-sky-600 hover:text-sky-800">Kembali ke Dashboard</a>
                </div>
            @endif

            <!-- SURAT MASUK -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 border-b border-gray-100 px-6 py-4 flex items-center justify-between">
                    <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4.25 7.5A2.25 2.25 0 016.5 5.25h11A2.25 2.25 0 0119.75 7.5v9.25A1.25 1.25 0 0118.5 18H6.5A2.25 2.25 0 014.25 15.75V7.5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 8l7 4.25L19 8" />
                        </svg>
                        Surat Masuk
                    </h3>
                    <span class="inline-flex items-center justify-center px-2.5 py-1 text-xs font-semibold rounded-full {{ $suratMasuk->count() > 0 ? 'bg-indigo-100 text-indigo-700' : 'bg-gray-200 text-gray-600' }}">
                        {{ $suratMasuk->count() }}
                    </span>
                </div>
                
                @if($suratMasuk->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No Surat</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Perihal</th>
                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($suratMasuk as $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-3 font-medium text-gray-900">{{ $item->no_surat }}</td>
                                        <td class="px-6 py-3 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-3 text-gray-600 truncate max-w-xs">{{ $item->perihal }}</td>
                                        <td class="px-6 py-3 text-right">
                                            <a href="{{ route('surat-masuk.index', ['q' => $item->no_surat]) }}" class="text-indigo-600 hover:text-indigo-900 text-xs font-semibold">Lihat Details &rarr;</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="px-6 py-8 text-center text-gray-500 text-sm">
                        Tidak ada surat masuk yang cocok dengan pencarian.
                    </div>
                @endif
            </div>

            <!-- SURAT KELUAR -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 border-b border-gray-100 px-6 py-4 flex items-center justify-between">
                    <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="h-5 w-5 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 5.25h11A2.25 2.25 0 0118.25 7.5v9.25A1.25 1.25 0 0117 18H5a1 1 0 01-1-1V6.25A1 1 0 015 5.25z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9.5 9.5H19M15.5 7l4 2.5-4 2.5" />
                        </svg>
                        Surat Keluar
                    </h3>
                    <span class="inline-flex items-center justify-center px-2.5 py-1 text-xs font-semibold rounded-full {{ $suratKeluar->count() > 0 ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-200 text-gray-600' }}">
                        {{ $suratKeluar->count() }}
                    </span>
                </div>
                
                @if($suratKeluar->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No Surat</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Perihal</th>
                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($suratKeluar as $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-3 font-medium text-gray-900">{{ $item->no_surat }}</td>
                                        <td class="px-6 py-3 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-3 text-gray-600 truncate max-w-xs">{{ $item->perihal }}</td>
                                        <td class="px-6 py-3 text-right">
                                            <a href="{{ route('surat-keluar.index', ['q' => $item->no_surat]) }}" class="text-emerald-600 hover:text-emerald-900 text-xs font-semibold">Lihat Details &rarr;</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="px-6 py-8 text-center text-gray-500 text-sm">
                        Tidak ada surat keluar yang cocok dengan pencarian.
                    </div>
                @endif
            </div>

            <!-- STANDAR TEKNIS -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 border-b border-gray-100 px-6 py-4 flex items-center justify-between">
                    <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="h-5 w-5 text-amber-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 4.75h14A1.25 1.25 0 0120.25 6v9.5A1.75 1.75 0 0118.5 17.25H7L4.75 19.5v-13A1.75 1.75 0 016.5 4.75z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 9h7m-7 4h4" />
                        </svg>
                        Standar Teknis
                    </h3>
                    <span class="inline-flex items-center justify-center px-2.5 py-1 text-xs font-semibold rounded-full {{ $standarTeknis->count() > 0 ? 'bg-amber-100 text-amber-700' : 'bg-gray-200 text-gray-600' }}">
                        {{ $standarTeknis->count() }}
                    </span>
                </div>
                
                @if($standarTeknis->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No Surat</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Perihal</th>
                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($standarTeknis as $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-3 font-medium text-gray-900">{{ $item->no_surat }}</td>
                                        <td class="px-6 py-3 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-3 text-gray-600 truncate max-w-xs">{{ $item->perihal }}</td>
                                        <td class="px-6 py-3 text-right">
                                            <a href="{{ route('standar-teknis.index', ['q' => $item->no_surat]) }}" class="text-amber-600 hover:text-amber-900 text-xs font-semibold">Lihat Details &rarr;</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="px-6 py-8 text-center text-gray-500 text-sm">
                        Tidak ada standar teknis yang cocok dengan pencarian.
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
