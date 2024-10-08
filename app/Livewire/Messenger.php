<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Messenger extends Component
{
    public $receiverId;
    public $receiverName;
    public $receiverProfileImage;
    public $messages = [];
    public $newMessage;

    protected $listeners = ['messageSent' => 'loadMessages'];

    public function mount($receiverId)
    {
        $this->receiverId = $receiverId;
        $receiver = User::where('id',$receiverId)->first();
        $this->receiverName =$receiver->name;
        $this->receiverProfileImage = $receiver->profile_photo_url;

        $this->loadMessages();
    }

    public function loadMessages()
    {
        $messages = Message::where(function($query) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $this->receiverId);
        })->orWhere(function($query) {
            $query->where('sender_id', $this->receiverId)
                ->where('receiver_id', Auth::id());
        });

        $this->messages= $messages->orderBy('created_at', 'asc')->get()->toArray();

        foreach ($messages as $message) {
            $message->update(['is_read'=>true]);
        }
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
