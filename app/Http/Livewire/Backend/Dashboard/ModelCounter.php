<?php

namespace App\Http\Livewire\Backend\Dashboard;

use Livewire\Component;
use App\Services\ModelCounterService;

class ModelCounter extends Component
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
    public function render()
    {
        return view('livewire.backend.dashboard.model-counter');
    }
}
