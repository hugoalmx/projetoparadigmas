<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\LeadService; // Importa o LeadService
use App\Services\RegistroService; // Importa o RegistroService

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Registra o LeadService para injeção automática
        $this->app->singleton(LeadService::class, function ($app) {
            return new LeadService();
        });

        // Registra o RegistroService para injeção automática
        $this->app->singleton(RegistroService::class, function ($app) {
            return new RegistroService();
        });
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

    }
}
