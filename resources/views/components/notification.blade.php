@php
    $notifications = [];
    if (session('notification_success')) {
        $notifications[] = ['type' => 'success', 'message' => session('notification_success')];
    }
    if (session('notification_error')) {
        $notifications[] = ['type' => 'error', 'message' => session('notification_error')];
    }
    if (session('notification_info')) {
        $notifications[] = ['type' => 'info', 'message' => session('notification_info')];
    }
    if (session('notification_warning')) {
        $notifications[] = ['type' => 'warning', 'message' => session('notification_warning')];
    }
@endphp

<div class="fixed top-0 right-0 z-50 p-4 space-y-3 pointer-events-none" id="notificationContainer">
    @foreach($notifications as $notification)
        <div class="notification"
             data-type="{{ $notification['type'] }}"
             data-message="{{ $notification['message'] }}"
             style="animation: slideInRight 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);">

            @if($notification['type'] === 'success')
                <div class="pointer-events-auto flex items-start gap-3 px-4 py-3 rounded-lg bg-gradient-to-r from-green-400/10 via-emerald-400/10 to-teal-400/10 border border-green-400/30 backdrop-blur-xl shadow-xl">
                    <svg class="h-5 w-5 text-green-500 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-green-700">Sukses</p>
                        <p class="text-sm text-green-600">{{ $notification['message'] }}</p>
                    </div>
                    <button class="close-notification text-green-400 hover:text-green-600 transition">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @elseif($notification['type'] === 'error')
                <div class="pointer-events-auto flex items-start gap-3 px-4 py-3 rounded-lg bg-gradient-to-r from-red-400/10 via-rose-400/10 to-pink-400/10 border border-red-400/30 backdrop-blur-xl shadow-xl">
                    <svg class="h-5 w-5 text-red-500 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-red-700">Error</p>
                        <p class="text-sm text-red-600">{{ $notification['message'] }}</p>
                    </div>
                    <button class="close-notification text-red-400 hover:text-red-600 transition">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @elseif($notification['type'] === 'info')
                <div class="pointer-events-auto flex items-start gap-3 px-4 py-3 rounded-lg bg-gradient-to-r from-blue-400/10 via-cyan-400/10 to-sky-400/10 border border-blue-400/30 backdrop-blur-xl shadow-xl">
                    <svg class="h-5 w-5 text-blue-500 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-blue-700">Informasi</p>
                        <p class="text-sm text-blue-600">{{ $notification['message'] }}</p>
                    </div>
                    <button class="close-notification text-blue-400 hover:text-blue-600 transition">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @elseif($notification['type'] === 'warning')
                <div class="pointer-events-auto flex items-start gap-3 px-4 py-3 rounded-lg bg-gradient-to-r from-amber-400/10 via-yellow-400/10 to-orange-400/10 border border-amber-400/30 backdrop-blur-xl shadow-xl">
                    <svg class="h-5 w-5 text-amber-500 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-amber-700">Peringatan</p>
                        <p class="text-sm text-amber-600">{{ $notification['message'] }}</p>
                    </div>
                    <button class="close-notification text-amber-400 hover:text-amber-600 transition">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    @endforeach
</div>

<style>
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }

    .notification.hiding {
        animation: fadeOut 0.3s ease-out forwards;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notifications = document.querySelectorAll('.notification');

        notifications.forEach(notif => {
            const closeBtn = notif.querySelector('.close-notification');

            // Close button functionality
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    notif.classList.add('hiding');
                    setTimeout(() => notif.remove(), 300);
                });
            }

            // Auto-dismiss after 4 seconds
            setTimeout(() => {
                if (notif.parentElement) {
                    notif.classList.add('hiding');
                    setTimeout(() => notif.remove(), 300);
                }
            }, 4000);
        });
    });
</script>
