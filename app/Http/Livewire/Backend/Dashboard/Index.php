<?php

namespace App\Http\Livewire\Backend\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;


class Index extends Component
{
    public $counters;

    /**
     * To initialize value for once
     * @return void
     */
    public function mount()
    {
        $this->counters = $this->get_counters();
    }

    /**
     * Get model counters
     * @return array
     */

    private function get_counters(): array
    {

        $counts =  DB::select("SELECT (SELECT COUNT(*) FROM conversations ) as conversations, (SELECT COUNT(*) FROM messages) as messages, (SELECT COUNT(*) FROM users) as users");
        return (array) collect($counts)->first();
    }

    /**
     * Display a listing of the resource
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        // dd($this->counters);
        return view('livewire.backend.dashboard.index');
    }
}
