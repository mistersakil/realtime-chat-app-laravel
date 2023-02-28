<?php

namespace App\Http\Livewire\Backend\Auth;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth as SystemAuth;


/**
 * Logout component
 * @author Sakil Jomaddar <sakil.diu.cse@gmail.com>
 */

class Logout extends Component
{
    public string $logout_icon;
    public string $title;

    /**
     * Set initial values for once
     * 
     * @return void 
     */

    public function mount(): void
    {
        $this->logout_icon = _icons("logout");
        $this->title = "Logout";
    }

    /**
     * Log the user out of the application
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {

        ## Logout currently login user
        SystemAuth::logout();

        ## Invalidate the user's session
        request()->session()->invalidate();

        ## Regenerate their CSRF token
        request()->session()->regenerateToken();

        ## Redirect the user to login page 
        return redirect()->route('admin.login');
    }


    /**
     * Render logout view
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.backend.auth.logout');
    }
}
