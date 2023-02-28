<?php

namespace App\Http\Livewire\Backend\Dashboard;

use Livewire\Component;
use Illuminate\Contracts\View\View;


class Index extends Component
{
    /**
     * Display a listing of the resource
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('livewire.backend.dashboard.index');
    }
}
