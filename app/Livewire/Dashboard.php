<?php

namespace App\Livewire;

use Livewire\Attributes\Locked;
use Livewire\Component;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;


#[Layout('layouts.app')]
class Dashboard extends Component
{
    use WithFileUploads;

    public $new_portfolio_url;
    public $username;
    public $total_ratings_count;
    public $total_provider_bookings_count;

    #[Locked]
    public $profileId;
    public $showModal = false;

    public $bio, $skills, $portfolio_url, $location, $availability, $latitude, $longitude;
    public $serviceTitle, $serviceDescription, $serviceCategory, $servicePrice;
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();

        $user = Auth::user();
        $profile = $user->profile;
        $this->username = $user->name;

        if ($profile) {
            $this->total_ratings_count=$profile->total_ratings_count;
            $this->total_provider_bookings_count= $user->total_provider_bookings_count;
            $this->profileId = $profile->id;
            $this->bio = $profile->bio;
            $this->skills = $profile->skills;
            $this->portfolio_url = $profile->portfolio_url; // This should be the stored path.
            $this->availability = $profile->availability;
            $this->location = $profile->location;
        }
    }

    #[Layout('layouts.guest')]
    public function createProfileAndService()
    {
        $this->validate([
            'bio' => 'required|string|max:255',
            'skills' => 'required|string',
            'availability' => 'required|boolean',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'location' => 'required|string|max:255',
            'serviceTitle' => 'required|string|max:255',
            'serviceDescription' => 'required|string|max:500',
            'serviceCategory' => 'required|int|max:255',
            'servicePrice' => 'required|numeric',
        ]);

        $latitude = $this->latitude ? $this->latitude : 5.1106446;
        $longitude = $this->longitude ? $this->longitude : -1.2987443;


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
        $profileId = Profile::where('user_id', Auth::id())->first()->id;

        // Create the service
        $service = Service::create([
            'provider_id' => $profileId,
            'title' => $this->serviceTitle,
            'description' => $this->serviceDescription,
            'category' => $this->serviceCategory,
            'price' => $this->servicePrice,
        ]);

        session()->flash('message', 'Profile and Service created successfully!');

        return redirect()->route('profile.setup');
    }


    public function store()
    {

        $this->validate([
            'bio' => 'required|string|max:255',
            'skills' => 'required|string',
            'availability' => 'required|boolean',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'location' => 'required|string|max:255',
        ]);

        if ($this->portfolio_url) {
            $this->validate([
                'new_portfolio_url' => 'nullable|image|max:1024',
            ]);
        }

        $profileData = [
            'bio' => $this->bio,
            'skills' => $this->skills,
            'availability' => $this->availability,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'location' => $this->location,
        ];

        if ($this->new_portfolio_url) {
            $profileData['portfolio_url'] = $this->new_portfolio_url->store('portfolio_images', 'public');
        }

        $profile = Auth::user()->profile()->updateOrCreate(
            ['user_id' => Auth::id()],
            $profileData
        );

        $this->showModal = false;

        session()->flash('message', 'Profile saved successfully.');
    }

    public function editProfile($bookingId)
    {
        $this->showModal = true;
    }

    public function updateprofile()
    {

        // Close the modal
        $this->showModal = false;

        session()->flash('success', 'Profile updated successfully.');
    }


    public function render()
    {
        return view('livewire.dashboard');
    }
}





