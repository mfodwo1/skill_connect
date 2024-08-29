<?php

namespace App\Livewire;

use App\Models\Profile;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ServiceProviderProfile extends Component
{
    public $provider;
    public $distance;

    protected $listeners = ['updateLocation' => 'calculateDistance'];

    public function mount($providerId)
    {
        $this->provider = Profile::with('user', 'services', 'reviews')->find($providerId);
    }

    public function calculateDistance($latitudeFrom, $longitudeFrom)
    {
        $providerLatitude = $this->provider->latitude;
        $providerLongitude = $this->provider->longitude;

        $this->distance = $this->haversineGreatCircleDistance(
            $latitudeFrom,
            $longitudeFrom,
            $providerLatitude,
            $providerLongitude
        );
    }

    private function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return round($angle * $earthRadius, 2);
    }

    public function bookProvider()
    {
        $booking = BookingModel::create([
            'service_id' => $this->provider->services->first()->id, // Assuming one service for simplicity
            'seeker_id' => Auth::id(),
            'provider_id' => $this->provider->id,
            'booking_date' => now(), // You can customize this to use a specific date
            'status' => 'pending',
            'payment_status' => 'not_required',
            'total_amount' => 0,
        ]);

        $providerUser = $this->provider->user;
        Notification::send($providerUser, new BookingNotification($booking));

        session()->flash('message', 'Booking successfully made! The service provider has been notified.');
    }


    public function render()
    {
        return view('livewire.service-provider-profile');
    }
}
