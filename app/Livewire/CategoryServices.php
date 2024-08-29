<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Service;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout("layouts.app")]
class CategoryServices extends Component
{

    public $services;
    public $categoryId;
    public $categoryName;
    public $latitude;
    public $longitude;


    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->categoryName = Category::findOrFail($this->categoryId)->value('name');
//        $this->categoryName = $category->name;
        $this->services = Service::where('category', $this->categoryId)->with('provider.user')->get();
    }

    #[on('updateLocation')]
    public function updateLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        // Calculate distance for each service
        foreach ($this->services as &$service) {
            $service->distance = $this->calculateDistance(
                $latitude,
                $longitude,
                $service->provider->latitude,
                $service->provider->longitude
            );
        }
    }

    public function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Radius of the earth in km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c; // Distance in km
        return round($distance, 2); // Return distance rounded to 2 decimal places
    }


//    public $services;
//    public $categoryId;
//    public $categoryName;
//
//    public $distance;
//
//    public function mount($categoryId)
//    {
//        $this->categoryId = $categoryId;
//        $category = Category::findOrFail($this->categoryId);
//        $this->categoryName = $category->name;
//        $this->services = Service::where('category', $this->categoryId)->with('provider.user')->get();
//    }
//
//    public function calculateDistance($latitudeFrom, $longitudeFrom)
//    {
//        $providerLatitude = $this->provider->latitude;
//        $providerLongitude = $this->provider->longitude;
//        @dd($providerLatitude, $providerLongitude, $latitudeFrom, $longitudeFrom);
//
//        $this->distance = $this->haversineGreatCircleDistance(
//            $latitudeFrom,
//            $longitudeFrom,
//            $providerLatitude,
//            $providerLongitude
//        );
//
//    }
//
//    private function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
//    {
//        $latFrom = deg2rad($latitudeFrom);
//        $lonFrom = deg2rad($longitudeFrom);
//        $latTo = deg2rad($latitudeTo);
//        $lonTo = deg2rad($longitudeTo);
//
//        $latDelta = $latTo - $latFrom;
//        $lonDelta = $lonTo - $lonFrom;
//
//        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
//                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
//        return round($angle * $earthRadius, 2);
//    }
//
//    public function bookProvider()
//    {
//        $booking = Booking::create([
//            'service_id' => $this->provider->services->first()->id, // Assuming one service for simplicity
//            'seeker_id' => Auth::id(),
//            'provider_id' => $this->provider->id,
//            'booking_date' => now(), // You can customize this to use a specific date
//            'status' => 'pending',
//            'payment_status' => 'not_required',
//            'total_amount' => 0,
//        ]);
//
//        $providerUser = $this->provider->user;
//        Notification::send($providerUser, new BookingNotification($booking));
//
//        session()->flash('message', 'Booking successfully made! The service provider has been notified.');
//    }

    public function render()
    {
        return view('livewire.category-services', [
            'services' => $this->services,
        ]);
    }
}
