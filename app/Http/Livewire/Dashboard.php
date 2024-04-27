<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;
    public $scrollPosition = 0;

    public function mount()
    {
        // Retrieve the currently authenticated user
        $this->user = Auth::user();
    }

    public function prev()
    {
        $this->scrollPosition -= 100; // Adjust as needed
    }

    public function next()
    {
        $this->scrollPosition += 100; // Adjust as needed
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'user' => $this->user,
        ]);
    }
}
