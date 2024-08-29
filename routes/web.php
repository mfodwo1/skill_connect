<?php

use App\Http\Controllers\LocationController;
use App\Livewire\CategoryListing;
use App\Livewire\CategoryServices;
use App\Livewire\ManageBookings;
use App\Livewire\Messenger;
use App\Livewire\NotificationManager;
use App\Livewire\ProviderProfile;
use App\Livewire\SeekerBookings;
use App\Livewire\ServiceProviderPage;
use App\Livewire\ServiceProviderProfile;
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

        Route::get('/notifications', NotificationManager::class)->name('notifications');
        Route::get('/categories', CategoryListing::class)->name('categories');
        Route::get('/category/{categoryId}/services', CategoryServices::class)->name('category.services');
        Route::get('/service/{serviceId}/provider', ServiceProviderPage::class)->name('service.provider.page');
        Route::get('/chat/{receiverId}', Messenger::class)->name('chat');

        Route::get('/bookings', ManageBookings::class)->name('bookings');
        Route::get('/bookings-list', SeekerBookings::class)->name('bookings.list');

    });

});
