<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SHSProgram extends Component
{
    public $choiceTrack = 'Academic Track';

    public function render()
    {
        return view('livewire.s-h-s-program');
    }
}
