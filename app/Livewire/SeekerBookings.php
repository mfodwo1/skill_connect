<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class SeekerBookings extends Component
{
    public $bookings;

    public function mount()
    {
        // Fetch the bookings for the authenticated service seeker
        $this->bookings = Booking::where('seeker_id', Auth::id())->with('service', 'provider')->get();
    }

    public function render()
    {
        return view('livewire.seeker-bookings');
    }
}
