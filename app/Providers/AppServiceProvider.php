<?php

namespace App\Providers;
use Blade;
use NumberFormatter;
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
        Blade::directive('currency', function ($expression) {
            return "Rp<?php echo number_format($expression, 0, ',', '.'); ?>";
        });
    }
}
