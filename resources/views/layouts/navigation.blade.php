<nav x-data="{ open: false }" class="min-h-screen bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="hidden md:flex md:flex-col w-64 bg-blue-900 border-r border-gray-200">
            <div class="h-16 flex items-center px-6 border-b border-gray-200">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-2xl bg-blue-900 flex items-center justify-center text-white">
                        <x-application-logo class="h-6 w-6 fill-current text-white" />
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-black">Admin Panel</div>
                        <div class="text-xs text-black">Surat Dishub</div>
                    </div>
                </a>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-xl {{ request()->routeIs('dashboard') ? 'bg-white text-black shadow-md ring-1 ring-indigo-100' : 'text-black hover:bg-indigo-50' }}">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l9-9 9 9M4.5 10.5V21h15V10.5" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('surat-masuk.index') }}" class="flex items-center justify-between px-3 py-2 text-sm font-medium rounded-xl {{ request()->routeIs('surat-masuk.*') ? 'bg-white text-black shadow-md ring-1 ring-indigo-100' : 'text-black hover:bg-indigo-50' }}">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4h16v5H4zM4 9l4 4h8l4-4M4 13v7h16v-7" />
                        </svg>
                        <span>Surat Masuk</span>
                    </div>
                    @if(($newIncomingCount ?? 0) > 0)
                        <span class="inline-flex items-center justify-center min-w-[1.75rem] px-1.5 py-0.5 text-xs font-semibold rounded-full bg-red-500 text-white">
                            {{ $newIncomingCount ?? 0 }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('surat-keluar.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-xl {{ request()->routeIs('surat-keluar.*') ? 'bg-white text-black shadow-md ring-1 ring-indigo-100' : 'text-black hover:bg-indigo-50' }}">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4h16v5H4zM4 9l4 4h8l4-4M4 13v7h16v-7" />
                    </svg>
                    <span>Surat Keluar</span>
                </a>
            </nav>

            <div class="px-4 pb-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium text-black hover:text-red-600 hover:bg-red-50 rounded-xl">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12H3m0 0l4-4m-4 4l4 4m4-14h6a2 2 0 012 2v12a2 2 0 01-2 2h-6" />
                        </svg>
                        <span>Keluar</span>
                    </button>
                </form>
                <div class="mt-4 pt-4 border-t border-gray-300 text-center">
                    <p class="text-xs text-gray-300">
                        &copy; 2026 Savare'4 Solution
                    </p>
                </div>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Top bar -->
            <header class="flex items-center justify-between h-16 bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3 md:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:bg-gray-100 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <span class="font-semibold text-gray-800">Admin Panel</span>
                </div>

                <div class="flex-1 flex items-center justify-end gap-4">
                    <button class="relative inline-flex items-center justify-center h-10 w-10 rounded-full bg-indigo-50 text-indigo-600 hover:bg-indigo-100">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 19a2 2 0 11-4 0" />
                        </svg>
                        @if(($newIncomingCount ?? 0) > 0)
                            <span class="absolute -top-0.5 -right-0.5 inline-flex items-center justify-center h-4 min-w-[1rem] px-0.5 rounded-full bg-red-500 text-[10px] font-semibold text-white">
                                {{ $newIncomingCount ?? 0 }}
                            </span>
                        @endif
                    </button>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none transition ease-in-out duration-150">
                                <div class="mr-2 h-7 w-7 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xs font-semibold">
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
            </header>

            <!-- Page content wrapper: Breeze renders slot in app.blade -->
        </div>

        <!-- Mobile sidebar -->
        <div class="md:hidden" x-show="open" x-cloak>
            <div class="fixed inset-0 z-40 flex">
                <div class="fixed inset-0 bg-black bg-opacity-30" @click="open = false"></div>
                <aside class="relative z-50 w-64 bg-blue-900 shadow-xl flex flex-col">
                        <div class="h-16 flex items-center px-6 border-b border-gray-200">
                        <span class="font-semibold text-black">Menu Admin</span>
                    </div>
                    <nav class="flex-1 px-4 py-4 space-y-1">
                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-white text-black ring-1 ring-indigo-100' : 'text-black hover:bg-indigo-50' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('surat-masuk.index') }}" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('surat-masuk.*') ? 'bg-white text-black ring-1 ring-indigo-100' : 'text-black hover:bg-indigo-50' }}">
                            <span>Surat Masuk</span>
                            @if(($newIncomingCount ?? 0) > 0)
                                <span class="inline-flex items-center justify-center min-w-[1.5rem] px-1 text-xs font-semibold rounded-full bg-red-500 text-white">
                                    {{ $newIncomingCount ?? 0 }}
                                </span>
                            @endif
                        </a>
                        <a href="{{ route('surat-keluar.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('surat-keluar.*') ? 'bg-white text-black ring-1 ring-indigo-100' : 'text-black hover:bg-indigo-50' }}">
                            Surat Keluar
                        </a>
                    </nav>
                    <div class="px-4 pb-4 border-t border-gray-300">
                        <p class="text-xs text-gray-300 text-center mt-4">
                            &copy; 2026 Savare'4 Solution
                        </p>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</nav>
