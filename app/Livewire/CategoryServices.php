<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout("layouts.app")]
class CategoryServices extends Component
{

    public $services;
    #[Locked]
    public $categoryId;
    public $category;
    public $latitude;
    public $longitude;

    public $rating = 70; // Example rating
    public $yellowStars;

    public function mount($categoryId)
    {
        $this->yellowStars = $this->getYellowStars($this->rating);


        $this->categoryId = $categoryId;
        $this->category = Category::findOrFail($this->categoryId)->first();
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

    public function getYellowStars($rating)
    {
        if ($rating >= 0 && $rating <= 5) {
            return 1;
        } elseif ($rating >= 6 && $rating <= 15) {
            return 2;
        } elseif ($rating >= 16 && $rating <= 30) {
            return 3;
        } elseif ($rating >= 31 && $rating <= 50) {
            return 4;
        } elseif ($rating > 50) {
            return 5;
        }

        return 0;
    }



    public function calculateDistance($lat1, $lon1, $lat2, $lon2): float
    {
        $earthRadius = 6371; // Radius of the earth in km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c; // Distance in km
        return round($distance, 3);
    }

    public function render()
    {
        return view('livewire.category-services', [
            'services' => $this->services,
        ]);
    }
}
