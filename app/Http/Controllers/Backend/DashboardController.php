<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('backend.dashboard.index');
    }
}
