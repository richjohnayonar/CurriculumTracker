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
        try {
            $this->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                // Authentication passed
                $this->emit('showToast', ['type' => 'success', 'message' => 'Logged in.']);
                return redirect()->intended('/');
            } else {
                // Authentication failed
                throw new \Exception('Invalid credentials.');
            }
        } catch (\Exception $e) {
            // Catch any exceptions
            $this->emit('showToast', ['type' => 'error', 'message' => 'Internal Server Error']);
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
