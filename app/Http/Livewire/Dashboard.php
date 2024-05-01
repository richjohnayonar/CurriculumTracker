<?php

namespace App\Http\Livewire;

use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    public $user;
    public $scrollPosition = 0;

    use WithPagination;

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
        $schools = School::paginate(10);
        return view('livewire.dashboard', [
            'user' => $this->user,
            'schools' => $schools,
        ]);
    }
}
