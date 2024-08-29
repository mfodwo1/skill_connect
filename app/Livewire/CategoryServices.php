<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Service;
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
