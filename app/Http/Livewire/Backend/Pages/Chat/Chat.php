<?php

namespace App\Http\Livewire\Backend\Pages\Chat;

use Livewire\Component;

class Chat extends Component
{
    public function render()
    {
        return view('livewire.backend.pages.chat.chat')->layout('backend.layout.master');
    }
}
