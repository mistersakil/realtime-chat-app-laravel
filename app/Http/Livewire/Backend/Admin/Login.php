<?php

namespace App\Http\Livewire\Backend\Admin;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.backend.admin.login')->layout('livewire.backend.admin.layout');
    }
}
