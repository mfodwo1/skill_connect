<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProfileAndService extends Component
{
    use WithFileUploads;

    public $bio, $skills, $portfolio_url, $location, $availability, $latitude, $longitude;
    public $serviceTitle, $serviceDescription, $serviceCategory, $servicePrice;
    public $categories;


    public function mount()
    {
        $this->categories = Category::all();
    }

    protected $rules = [
        'bio' => 'required|string|max:255',
        'skills' => 'required|string|max:255',
        'portfolio_url' => 'nullable|image|max:1024',
        'location' => 'required|string|max:255',
        'availability' => 'nullable|boolean',
        'latitude' => 'required|numeric|between:-90,90',
        'longitude' => 'required|numeric|between:-180,180',
        'serviceTitle' => 'required|string|max:255',
        'serviceDescription' => 'required|string|max:500',
        'serviceCategory' => 'required|int|max:255',
        'servicePrice' => 'required|numeric',
    ];

    #[Layout('layouts.guest')]
    public function createProfileAndService()
    {
        $this->validate();

        $portfolioImagePath = $this->portfolio_url ? $this->portfolio_url->store('portfolio_images', 'public') : null;

        // Create the profile
        $profile = Profile::create([
            'user_id' => Auth::id(),
            'bio' => $this->bio,
            'skills' => $this->skills,
            'portfolio_url' => $portfolioImagePath,
            'location' => $this->location,
            'availability' => $this->availability,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'rating' => 0,
            'rating_count' => 0,
            'verified' => false,
        ]);
        $profileId =Profile::where('user_id', Auth::id())->first()->id;

        // Create the service
        $service = Service::create([
            'provider_id'=> $profileId,
            'title' => $this->serviceTitle,
            'description' => $this->serviceDescription,
            'category' => $this->serviceCategory,
            'price' => $this->servicePrice,
        ]);

        session()->flash('message', 'Profile and Service created successfully!');

        return redirect()->route('profile.setup');
    }

    public function render()
    {
        return view('livewire.create-profile-and-service');
    }
}
