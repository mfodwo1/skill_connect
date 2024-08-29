<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Messenger extends Component
{
    public $providerId;
    public $seekerId;
    public $messages;
    public $newMessage;

    public function mount($providerId, $seekerId)
    {
        $this->providerId = $providerId;
        $this->seekerId = $seekerId;

        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::where(function($query) {
            $query->where('sender_id', $this->providerId)
                ->where('receiver_id', $this->seekerId);
        })->orWhere(function($query) {
            $query->where('sender_id', $this->seekerId)
                ->where('receiver_id', $this->providerId);
        })->orderBy('created_at', 'asc')->get();
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required|string|max:500',
        ]);

        Message::create([
            'booking_id' => null, // Assuming there's no specific booking at this stage
            'sender_id' => Auth::id(),
            'receiver_id' => Auth::id() === $this->providerId ? $this->seekerId : $this->providerId,
            'message' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->loadMessages();
    }

    public function render()
    {
        $this->loadMessages();
        return view('livewire.messenger');
    }
}
