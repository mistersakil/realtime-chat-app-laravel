<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BackendController;

/**
 * AuthController
 * @author Sakil Jomaddar <sakil.diu.cse@gmail.com>
 */

class AuthController extends BackendController
{
    /**
     * showLoginForm method display user login form
     * @return \Illuminate\Contracts\View\View 
     */
    public function show_login_form(): View
    {
        return view('user::auth.show_login_form');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {

        ## Logout currently login user
        Auth::logout();

        ## Invalidate the user's session
        $request->session()->invalidate();

        ## Regenerate their CSRF token
        $request->session()->regenerateToken();

        ## Redirect the user to login page 
        return redirect()->route('admin.login');
    }
}
