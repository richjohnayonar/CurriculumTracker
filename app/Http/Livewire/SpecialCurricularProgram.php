<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SpecialCurricularProgram extends Component
{
    public $choiceTrack = 'Special Science Elementary School (SSES) Program';
    
    public function render()
    {
        return view('livewire.special-curricular-program');
    }
}
