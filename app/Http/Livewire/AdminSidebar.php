<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminSidebar extends Component
{
    public $activeLink = '';
    public function navigateTo($route)
    {
        // Set the active link to the clicked route
        $this->activeLink = $route;

        // Navigate to the specified route
        return redirect()->to($route);
    }   

     public function logout()
    {
        Auth::logout();

        // Redirect to the login page after logout
        return redirect()->to('/login');
    }

    public function render()
    {
        return view('livewire.admin-sidebar');
    }
}
