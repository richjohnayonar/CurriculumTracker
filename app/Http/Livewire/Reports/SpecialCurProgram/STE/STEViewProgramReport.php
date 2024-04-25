<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\STE;

use App\Models\School;
use App\Models\STEProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class STEViewProgramReport extends Component
{
    use WithPagination;

    public $STEProgram;
    public $STEProgramID;
    public $school;

    public function mount($id)
    {
        // Retrieve the academic track data based on the provided ID
        $this->STEProgramID = $id;
        $this->STEProgram = STEProgramModel::findOrFail($id);
        $this->school = School::findOrFail($this->STEProgram->school_id);
    }

      public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 

    public function render()
    {
        return view('livewire.reports.special-cur-program.s-t-e.s-t-e-view-program-report',[
            'school'=> $this->school,
        ]);
    }
}
