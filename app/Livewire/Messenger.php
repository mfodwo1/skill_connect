<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Messenger extends Component
{
    public $receiverId;
    public $messages = [];
    public $newMessage;

    protected $listeners = ['messageSent' => 'loadMessages'];

    public function mount($receiverId)
    {
        $this->receiverId = $receiverId;

        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::where(function($query) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $this->receiverId);
        })->orWhere(function($query) {
            $query->where('sender_id', $this->receiverId)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get()->toArray();
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required|string|max:500',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiverId,
            'message' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->loadMessages();

        // Emit the event to other components
        $this->dispatch('messageSent');
    }

    public function render()
    {
        return view('livewire.messenger');
    }
}
