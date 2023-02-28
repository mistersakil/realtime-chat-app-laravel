<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Contracts\View\View;

class ConversationController extends BackendController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('livewire.backend.chat.chat');
    }
}
