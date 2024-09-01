<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
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

    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->category = Category::findOrFail($this->categoryId)->first();
        $this->services = Service::where('category', $this->categoryId)->with('provider.user')->get();

    }

    #[on('updateLocation')]
    public function updateLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        foreach ($this->services as &$service) {
            $service->distance = $this->calculateDistance(
                $latitude,
                $longitude,
                $service->provider->latitude,
                $service->provider->longitude
            );
        }
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
