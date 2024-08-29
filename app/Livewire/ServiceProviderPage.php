<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Service;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.app')]
class ServiceProviderPage extends Component
{
    #[locked]
    public $serviceId;
    public $service;
    public $message = 'i want to book';

    public function mount($serviceId)
    {
        $this->serviceId = $serviceId;
        $this->service = Service::find($serviceId)->with('provider')->first();
    }

    public function bookProvider()
    {
        $booking = Booking::create([
            'service_id' => $this->service->id,
            'seeker_id' => Auth::id(),
            'provider_id' => $this->service->id,
            'booking_date' => now(),
            'status' => 'pending',
            'booking_message' =>$this->message,
        ]);

        $providerUser = $this->service->provider->user;
        Notification::send($providerUser, new BookingNotification($booking));

        session()->flash('message', 'Booking successfully made! The service provider has been notified.');
    }

    public function render()
    {
        return view('livewire.service-provider_page');
    }
}
