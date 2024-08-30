<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
#[Title('Profile')]
class ProviderProfile extends Component
{
    use WithFileUploads;

    public $bio;
    public $skills;
    public $portfolio_url;
    public $new_portfolio_url;
    public $availability;

    public $latitude;
    public $longitude;
    public $username;
    public $location;
    public $total_ratings_count;
    public $total_provider_bookings_count;

    #[Locked]
    public $profileId;
    public $showModal = false;

    public function mount()
    {
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
        return view('livewire.profile');
    }
}
