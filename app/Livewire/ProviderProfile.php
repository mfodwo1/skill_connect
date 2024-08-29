<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Profile')]
class ProviderProfile extends Component
{
    public $bio;
    public $skills;
    public $portfolio_url;
    public $availability;

    public $latitude;
    public $longitude;

    public function mount()
    {
        $profile = Auth::user()->profile;

        if ($profile) {
            $this->bio = $profile->bio;
            $this->skills = $profile->skills;
            $this->portfolio_url = $profile->portfolio_url;
            $this->availability = $profile->availability;
        }
    }

    public function store()
    {
        $this->validate([
            'bio' => 'required|string|max:255',
            'skills' => 'required|string',
            'portfolio_url' => 'nullable|url',
            'availability' => 'required|boolean|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $profile = Auth::user()->profile()->updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'bio' => $this->bio,
                'skills' => $this->skills,
                'portfolio_url' => $this->portfolio_url,
                'availability' => $this->availability,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ]
        );

        session()->flash('message', 'Profile saved successfully.');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
