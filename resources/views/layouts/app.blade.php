<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">

        <div class="min-h-screen flex bg-gray-50">
            <!-- Notification Component -->
            <x-notification />

            <!-- Sidebar -->
            <aside class="hidden md:flex md:flex-col w-64 bg-white border-r border-gray-200 text-slate-700 sticky top-0 h-screen overflow-y-auto">
                <div class="h-16 flex items-center px-6 border-b border-gray-100">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-2xl flex items-center justify-center">
                            <x-application-logo class="h-9 w-9 object-contain" />
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-900">Admin Panel</div>
                            <div class="text-xs text-slate-500">Sistarsip</div>
                        </div>
                    </a>
                </div>

                <nav class="flex-1 px-4 py-4 space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-xl {{ request()->routeIs('dashboard') ? 'bg-sky-50 text-sky-600 shadow-sm ring-1 ring-sky-100' : 'text-slate-700 hover:bg-gray-100' }}">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M3.5 11.5L12 4l8.5 7.5M5 10.75V20h14v-9.25" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('surat-masuk.index') }}" class="flex items-center justify-between px-3 py-2 text-sm font-medium rounded-xl {{ request()->routeIs('surat-masuk.*') ? 'bg-sky-50 text-sky-600 shadow-sm ring-1 ring-sky-100' : 'text-slate-700 hover:bg-gray-100' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4.25 7.5A2.25 2.25 0 016.5 5.25h11A2.25 2.25 0 0119.75 7.5v9.25A1.25 1.25 0 0118.5 18H6.5A2.25 2.25 0 014.25 15.75V7.5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 8l7 4.25L19 8" />
                            </svg>
                            <span>Surat Masuk</span>
                        </div>
                        @if(($newIncomingCount ?? 0) > 0)
                            <span class="inline-flex items-center justify-center min-w-[1.75rem] px-1.5 py-0.5 text-xs font-semibold rounded-full bg-red-500 text-white">
                                {{ $newIncomingCount ?? 0 }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('surat-keluar.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-xl {{ request()->routeIs('surat-keluar.*') ? 'bg-sky-50 text-sky-600 shadow-sm ring-1 ring-sky-100' : 'text-slate-700 hover:bg-gray-100' }}">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 5.25h11A2.25 2.25 0 0118.25 7.5v9.25A1.25 1.25 0 0117 18H5a1 1 0 01-1-1V6.25A1 1 0 015 5.25z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9.5 9.5H19M15.5 7l4 2.5-4 2.5" />
                        </svg>
                        <span>Surat Keluar</span>
                    </a>

                    <a href="{{ route('standar-teknis.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-xl {{ request()->routeIs('standar-teknis.*') ? 'bg-sky-50 text-sky-600 shadow-sm ring-1 ring-sky-100' : 'text-slate-700 hover:bg-gray-100' }}">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M5 4.75h14A1.25 1.25 0 0120.25 6v9.5A1.75 1.75 0 0118.5 17.25H7L4.75 19.5v-13A1.75 1.75 0 016.5 4.75z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 9h7m-7 4h4" />
                        </svg>
                        <span>Standar Teknis</span>
                    </a>
                </nav>
            </aside>

            <!-- Main area -->
            <div class="flex-1 flex flex-col min-h-screen">
                <!-- Top bar -->
                <header class="flex flex-col bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex flex-col">
                            @if(request()->routeIs('dashboard'))
                                <h2 class="text-lg font-bold text-gray-900">Dashboard</h2>
                                <p class="text-xs text-gray-500">Kelola data surat masuk, surat keluar, dan standar teknis dengan mudah.</p>
                            @elseif(request()->routeIs('surat-masuk.*'))
                                <h2 class="text-lg font-bold text-gray-900">Surat Masuk</h2>
                                <p class="text-xs text-gray-500">Kelola dan pantau semua surat masuk yang diterima.</p>
                            @elseif(request()->routeIs('surat-keluar.*'))
                                <h2 class="text-lg font-bold text-gray-900">Surat Keluar</h2>
                                <p class="text-xs text-gray-500">Kelola dan pantau semua surat keluar yang dikirimkan.</p>
                            @elseif(request()->routeIs('standar-teknis.*'))
                                <h2 class="text-lg font-bold text-gray-900">Standar Teknis</h2>
                                <p class="text-xs text-gray-500">Daftar dokumen standar teknis dalam bentuk PDF.</p>
                            @elseif(request()->routeIs('profile.*'))
                                <h2 class="text-lg font-bold text-gray-900">Profile</h2>
                                <p class="text-xs text-gray-500">Kelola informasi akun dan pengaturan profil Anda.</p>
                            @elseif(request()->routeIs('pencarian.*'))
                                <h2 class="text-lg font-bold text-gray-900">Pencarian Global</h2>
                                <p class="text-xs text-gray-500">Hasil pencarian di seluruh dokumen.</p>
                            @else
                                <h2 class="text-lg font-bold text-gray-900">Admin Panel</h2>
                                <p class="text-xs text-gray-500">Selamat datang di Admin Panel.</p>
                            @endif
                        </div>
                        <div class="flex items-center justify-end gap-4">

                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none transition ease-in-out duration-150">
                                        <div class="mr-2 h-7 w-7 rounded-full bg-sky-500 text-white flex items-center justify-center text-xs font-semibold">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                        </div>
                                        <div class="hidden sm:block">{{ Auth::user()->name }}</div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 py-4">
                        <div class="flex items-center gap-3">
                            @if(request()->routeIs('standar-teknis.*'))
                                <a href="{{ route('standar-teknis.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-sky-500 text-white text-sm font-medium shadow hover:bg-sky-600">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span>Tambah Standar Teknis</span>
                                </a>

                                <div class="h-6 w-px bg-gray-200 rounded mx-2"></div>
                            @elseif(request()->routeIs('surat-masuk.*'))
                                <a href="{{ route('surat-masuk.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-sky-500 text-white text-sm font-medium shadow hover:bg-sky-600">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span>Tambah Surat Masuk</span>
                                </a>

                                <div class="h-6 w-px bg-gray-200 rounded mx-2"></div>
                            @elseif(request()->routeIs('surat-keluar.*'))
                                <a href="{{ route('surat-keluar.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-sky-500 text-white text-sm font-medium shadow hover:bg-sky-600">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span>Tambah Surat Keluar</span>
                                </a>

                                <div class="h-6 w-px bg-gray-200 rounded mx-2"></div>
                            @endif

                            @unless(request()->routeIs('dashboard'))
                                @php
                                    $searchAction = route('pencarian.index');
                                    $searchPlaceholder = 'Cari global...';
                                    if (request()->routeIs('surat-masuk.*')) {
                                        $searchAction = route('surat-masuk.index');
                                        $searchPlaceholder = 'Cari di Surat Masuk...';
                                    } elseif (request()->routeIs('surat-keluar.*')) {
                                        $searchAction = route('surat-keluar.index');
                                        $searchPlaceholder = 'Cari di Surat Keluar...';
                                    } elseif (request()->routeIs('standar-teknis.*')) {
                                        $searchAction = route('standar-teknis.index');
                                        $searchPlaceholder = 'Cari di Standar Teknis...';
                                    }
                                @endphp
                                <form action="{{ $searchAction }}" method="GET" class="relative">
                                    <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ $searchPlaceholder }}" class="w-64 rounded-full border border-gray-300 px-4 py-2 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all" />
                                </form>
                            @endunless
                        </div>
                    </div>
                </header>

                <div class="ml-64">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <!-- Page Content -->
                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('scripts')
    </body>
</html>
