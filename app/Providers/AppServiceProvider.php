<?php

namespace App\Providers;

use App\Models\SuratMasuk;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                $newIncomingCount = SuratMasuk::where('is_read', false)->count();
            } catch (\Throwable $e) {
                $newIncomingCount = 0;
            }

            $view->with('newIncomingCount', $newIncomingCount);
        });
    }
}
