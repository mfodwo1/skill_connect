<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ManageBookings extends Component
{
    public $bookings;
    public $selectedBooking;
    public $status;
    public $showModal = false;

    public function mount()
    {
        $this->bookings = Booking::where('provider_id', Auth::user()->id)->with('seeker')->get();
    }

    public function selectBooking($bookingId)
    {
        $this->selectedBooking = Booking::where('id', $bookingId)->first();
        $this->status = $this->selectedBooking->status;
        $this->showModal = true;
    }

    public function updateStatus()
    {
        if ($this->selectedBooking->provider_id !== Auth::user()->id) {
            session()->flash('error', 'Unauthorized action.');
            return;
        }

        // Update the status
        $this->selectedBooking->status = $this->status;
        $this->selectedBooking->save();

        // Reload the bookings after updating the status
        $this->bookings = Booking::where('provider_id', Auth::user()->id)->get();

        // Close the modal
        $this->showModal = false;

        session()->flash('success', 'Booking status updated successfully.');
    }




    public function render()
    {
        return view('livewire.manage-bookings');
    }
}
