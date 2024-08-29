<?php

namespace App\Providers;

use App\Listeners\UpdateServiceProviderCoordinates;
use Event;
use Illuminate\Auth\Events\Authenticated;
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
        Event::listen(
            Authenticated::class,
        UpdateServiceProviderCoordinates::class
        );

    }
}
