<?php

use App\Http\Controllers\LocationController;
use App\Http\Middleware\CheckServiceProviderProfile;
use App\Livewire\CategoryListing;
use App\Livewire\CategoryServices;
use App\Livewire\Messenger;
use App\Livewire\ProviderProfile;
use App\Livewire\ServiceProviderProfile;
use App\Livewire\ServiceProviders;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/provider-profile', ProviderProfile::class)->name('profile.setup');

    Route::middleware([
        'ensure_profile_creation',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::post('/store-location', [LocationController::class, 'store'])->middleware('auth');
        Route::get('/categories', CategoryListing::class)->name('categories');
        Route::get('/category/{categoryId}/services', CategoryServices::class)->name('category.services');
        Route::get('/service/{serviceId}/providers', ServiceProviders::class)->name('service.providers');
        Route::get('/service-provider/{providerId}/profile', ServiceProviderProfile::class)->name('service-provider.profile');
        Route::get('/chat/{providerId}/{seekerId}', Messenger::class)->name('chat');
    });

});
