<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-lg ring-4 ring-white/50">
                <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-900 tracking-tight">
                    {{ __('Pengaturan Profil') }}
                </h2>
                <p class="text-sm font-medium text-gray-500 italic">Kelola informasi akun dan amankan profil Anda.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Sidebar Info -->
                <div class="md:col-span-1 space-y-6">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-100 p-8 transform transition-all duration-300 hover:shadow-2xl">
                        <div class="flex flex-col items-center text-center">
                            <div class="relative group">
                                <div class="absolute rounded-full"></div>
                                <div class="relative h-24 w-24 bg-gray-100 rounded-full flex items-center justify-center border-4 border-white shadow-inner overflow-hidden">
                                     <span class="text-3xl font-bold bg-clip-text text-purple-200 text-transparent uppercase">
                                        {{ substr($user->name, 0, 1) }}
                                     </span>
                                </div>
                            </div>
                            <h3 class="mt-4 text-xl font-bold text-gray-900 leading-tight">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500 font-medium">{{ $user->email }}</p>
                            
                            <div class="mt-6 w-full pt-6 border-t border-gray-100 grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <span class="block text-xl font-bold text-indigo-600">User</span>
                                    <span class="text-xs font-semibold text-gray-400 tracking-widest uppercase">Role</span>
                                </div>
                                <div class="text-center">
                                    <span class="block text-xl font-bold text-indigo-600">{{ $user->created_at->format('M Y') }}</span>
                                    <span class="text-xs font-semibold text-gray-400 tracking-widest uppercase">Member Since</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-indigo-600 rounded-3xl p-6 text-white shadow-lg overflow-hidden relative">
                         <div class="absolute top-0 right-0 -mr-6 -mt-6 h-24 w-24 bg-white opacity-10 rounded-full"></div>
                         <h4 class="relative font-bold text-lg mb-2 flex items-center gap-2">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Pusat Bantuan
                         </h4>
                         <p class="relative text-sm text-indigo-100 mb-4 font-medium leading-relaxed">Butuh bantuan terkait akun Anda? Tim dukungan kami siap membantu setiap saat.</p>
                         <form action="https://wa.link/fvvqun" target="_blank">
  <button
    type="submit"
    class="w-full py-2 bg-white text-indigo-600 text-sm font-bold rounded-xl shadow-md transform transition-all duration-200 hover:scale-105 hover:bg-indigo-50">
    Hubungi Support
  </button>
</form>
                    </div>
                </div>

                <!-- Main Section -->
                <div class="md:col-span-2 space-y-8">
                    <!-- Update Information -->
                    <div class="bg-white/70 backdrop-blur-xl border border-white shadow-2xl sm:rounded-3xl p-8 transform transition-all duration-300">
                        <div class="max-w-2xl mx-auto">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Update Password -->
                    <div class="bg-white/70 backdrop-blur-xl border border-white shadow-2xl sm:rounded-3xl p-8 transform transition-all duration-300">
                        <div class="max-w-2xl mx-auto">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
