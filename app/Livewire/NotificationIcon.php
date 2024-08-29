<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationIcon extends Component
{
    public $unreadCount;

    public function mount()
    {
        $this->unreadCount = Auth::user()->unreadNotifications->count();
    }

    public function render()
    {
        return view('livewire.notification-icon', [
            'unreadCount' => $this->unreadCount,
        ]);
    }
}

