<?php

namespace App\Http\Livewire\Backend\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Login extends Component
{
    public string $email;
    public string $password;

    /**
     * Validation rules
     * @var array
     */
    protected $rules = [
        'email'             => ['required', 'email'],
        'password'          => ['required', 'min:8'],
    ];

    /**
     * Customize the validation messages
     * @var array
     */
    protected $messages = [
        'email.required'    => 'Email can not be empty',
        'email.email'       => 'Email format is invalid',
        'password.required' => 'Password can not be empty',
        'password.min'      => 'Password minimum length is 8',
    ];

    /**
     * To initialize value just for once
     * @return void
     */

    public function mount()
    {
        $this->email = 'sakil@gmail.com';
        $this->password = '12345678#';
    }

    /**
     * To validate an input field after every update
     * @return void
     */

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Login process
     */
    public function login_process()
    {

        ## Validate rules
        $this->validate();

        ## Attempt to login
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            request()->session()->regenerate();
            return redirect()->intended('admin');
        } else {
            return redirect()->back();
        }
    }

    /**     
     * Display login view
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $data = ['meta_title' => 'Login'];
        return view('livewire.backend.admin.login')->layout('livewire.backend.admin.layout', $data);
    }
}
