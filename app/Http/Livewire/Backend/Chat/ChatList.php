<?php

namespace App\Http\Livewire\Backend\Chat;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class ChatList extends Component
{
    public function render(): View
    {
        return view('livewire.backend.chat.chat-list');
    }
}
