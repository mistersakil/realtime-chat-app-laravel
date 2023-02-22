<?php

namespace App\Http\Livewire\Backend\Pages\Dashboard;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.backend.pages.dashboard.dashboard')->layout('backend.layout.master');
    }
}
