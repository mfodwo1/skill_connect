<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Livewire\CategoryListing;
use App\Livewire\CategoryServices;
use App\Livewire\CreateProfileAndService;
use App\Livewire\Dashboard;
use App\Livewire\ManageBookings;
use App\Livewire\MessageList;
use App\Livewire\Messenger;
use App\Livewire\NotificationManager;
use App\Livewire\ProviderProfile;
use App\Livewire\SeekerBookings;
use App\Livewire\ServiceProviderPage;
use App\Livewire\ServiceProviderProfile;
use App\Livewire\Settings;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/create-profile-service', CreateProfileAndService::class)->name('create.profile.service');


    Route::middleware([
        'ensure_profile_creation',
    ])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/provider-profile', ProviderProfile::class)->name('profile.setup');
        Route::get('/notifications', NotificationManager::class)->name('notifications');
        Route::get('/categories', CategoryListing::class)->name('categories');
        Route::get('/category/{categoryId}/services', CategoryServices::class)->name('category.services');
        Route::get('/service/{serviceId}/provider', ServiceProviderPage::class)->name('service.provider.page');

        Route::get('/messages', MessageList::class)->name('message.list');
        Route::get('/chat/{receiverId}', Messenger::class)->name('chat');

        Route::get('/bookings', ManageBookings::class)->name('bookings');
        Route::get('/bookings-list', SeekerBookings::class)->name('bookings.list');

        Route::get('/settings', Settings::class)->name('settings');

    });

});
