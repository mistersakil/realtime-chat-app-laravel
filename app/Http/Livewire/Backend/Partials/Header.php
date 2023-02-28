<?php

namespace App\Http\Livewire\Backend\Partials;

use Livewire\Component;

class Header extends Component
{
    public string $user_name;
    public string $user_email;

    /**
     * Set initial value for once
     *
     * @return void
     */
    public function mount()
    {
        $auth_user = auth()->user();
        $this->user_name = ucwords($auth_user->name);
        $this->user_email = $auth_user->email;
    }

    public function render()
    {
        return view('livewire.backend.partials.header');
    }
}
