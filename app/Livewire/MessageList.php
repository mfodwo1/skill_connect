<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class MessageList extends Component
{
    public $conversations = [];

    protected function loadConversations()
    {
        $userId = Auth::id();

        // Get all distinct users the current user has conversations with
        $conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver'])
            ->get()
            ->groupBy(function($message) use ($userId) {
                return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
            });

        $this->conversations = $conversations->map(function($conversationGroup) use ($userId) {
            $lastMessage = $conversationGroup->last();
            $otherUser = $lastMessage->sender_id == $userId ? $lastMessage->receiver : $lastMessage->sender;
            $unreadCount = $conversationGroup->where('receiver_id', $userId)->where('is_read', false)->count();
            return [
                'user' => $otherUser,
                'lastMessage' => $lastMessage,
                'unreadCount' => $unreadCount,
            ];
        });
    }

    public function render()
    {
        $this->loadConversations();
        return view('livewire.message-list');
    }
}
