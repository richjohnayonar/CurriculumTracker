<?php

namespace App\Http\Livewire;

use App\Models\School as ModelsSchool;
use Livewire\Component;

class School extends Component
{
    public $school_id;
    public $name;

    public function savePost(){
        // Validate the input fields if needed
        $validatedData = $this->validate([
            'school_id' => 'required',
            'name' => 'required',
        ]);

        // Create a new School model instance with the validated data
        ModelsSchool::create($validatedData);
    }

    public function render()
    {
        return view('livewire.school');
    }
}
