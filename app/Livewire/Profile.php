<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $bio;
    public $skills;
    public $portfolio_url;
    public $availability;

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
            'availability' => 'required|string|max:255',
        ]);

        $profile = Auth::user()->profile()->updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'bio' => $this->bio,
                'skills' => $this->skills,
                'portfolio_url' => $this->portfolio_url,
                'availability' => $this->availability,
            ]
        );

        session()->flash('message', 'Profile saved successfully.');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
