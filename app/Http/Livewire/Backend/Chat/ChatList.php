<?php

namespace App\Http\Livewire\Backend\Chat;

use App\Models\User;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ChatList extends Component
{
    public User $users;

    public function mound():void{
        $this->users = User::get();
    }
    public function render(): View
    {
        return view('livewire.backend.chat.chat-list');
    }
}
