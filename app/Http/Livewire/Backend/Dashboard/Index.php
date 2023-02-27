<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Services\ModelCounterService;
use Livewire\Component;
use Illuminate\Contracts\View\View;


class Index extends Component
{
    public $counters;
    private $model_counter_service;

    /**
     * To initialize value for once
     * @return void
     */
    public function mount(ModelCounterService $model_counter_service): void
    {
        $this->model_counter_service = $model_counter_service;

        $this->counters = $this->get_counters();
    }

    /**
     * Get model counters
     * @return array
     */

    private function get_counters(): array
    {
        return $this->model_counter_service->get_counters();
    }

    /**
     * Display a listing of the resource
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('livewire.backend.dashboard.index');
    }
}
