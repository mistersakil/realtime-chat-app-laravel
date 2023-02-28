<?php

namespace App\Http\Livewire\Backend\Chat;

use Livewire\Component;

class Chat extends Component
{
    public $sakil = 'sakil';
    public function render()
    {
        return view('livewire.backend.chat.chat');
    }
}
