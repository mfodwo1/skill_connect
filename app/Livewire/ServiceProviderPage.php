<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Review;
use App\Models\Service;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.guest')]
class ServiceProviderPage extends Component
{
    #[locked]
    public $serviceId;
    public $service;
    public $message = 'i want to book';
    public $rating;
    public $totalRating;
    public $totalTaskCompleted;
    public $review;

    public function mount($serviceId)
    {
        $this->serviceId = $serviceId;
        $this->service = Service::where('id',$this->serviceId)->with('provider')->first();
        $providerId = $this->service->provider_id;
        $this->totalRating = Review::where('provider_id', $providerId)->count();
        $this->totalTaskCompleted = Booking::where('provider_id', $providerId)->where('status', 'completed')->count();
    }

    public function bookProvider()
    {
        $booking = Booking::create([
            'service_id' => $this->service->id,
            'seeker_id' => Auth::id(),
            'provider_id' => $this->service->id,
            'booking_date' => now(),
            'status' => 'pending',
            'booking_message' =>$this->message,
        ]);

        $providerUser = $this->service->provider->user;
        Notification::send($providerUser, new BookingNotification($booking));

        session()->flash('success', 'Booking successfully made! The service provider has been notified.');
    }


    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'nullable|string|max:1000',
    ];

    public function submitReview()
    {
        $this->validate();

        Review::create([
            'seeker_id' => Auth::id(),
            'provider_id' => $this->service->provider->id,
            'rating' => $this->rating,
            'review' => $this->review,
        ]);

        $review = Review::where('provider_id', $this->service->provider->id)->get();

        $this->service->provider()->update([
            'rating' => $review->avg('rating'),
            'rating_count'=>$review->count('rating'),
        ]);

        session()->flash('message', 'Thank you for your feedback!');
        $this->reset(['rating', 'review']);
    }


    public function render()
    {
        $reviews = Review::where('provider_id', $this->service->provider->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.service-provider_page',[
            'reviews' => $reviews,
        ]);
    }
}
