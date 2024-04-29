<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $role; // Add role property

    public function register()
    {
         try {
            $this->validate([
                'name' => User::$rules['name'],
                'email' => User::$rules['email'],
                'password' => User::$rules['password'],
            ]);

            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            
            $this->emit('showToast', ['type' => 'success', 'message' => 'Account Created']);
            return redirect()->to('/login');
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
        return view('livewire.auth.register')->layout('layouts.auth');;
    }
}
