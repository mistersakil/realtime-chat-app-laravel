<?php

namespace App\Http\Livewire\Backend\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public string $email;
    public string $password;


    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
    ];

    public function mount()
    {
        $this->email = '';
        $this->password = '12345678';
    }

    /**
     * Login process
     * @return admin 
     */
    public function login_process()
    {

        ## Validate rules
        $this->validate();

        ## Attempt to login
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            request()->session()->regenerate();
            dd("ok");

            return redirect()->intended('admin/dashboard');
        } else {
            dd("not ok");
        }
    }

    /**     
     * Display login view
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.backend.admin.login')->layout('livewire.backend.admin.layout');
    }
}
