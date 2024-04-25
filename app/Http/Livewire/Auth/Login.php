<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Authentication passed
            return redirect()->intended('/');
        } else {
            // Authentication failed
            session()->flash('error', 'Invalid credentials.');
        }
    }
    
    public function navigateTo($link)
    {
        // Navigate to the specified route
        return redirect()->to("/{$link}");
    } 

    public function render()
    {
       return view('livewire.auth.login')->layout('layouts.auth');
    }
}
