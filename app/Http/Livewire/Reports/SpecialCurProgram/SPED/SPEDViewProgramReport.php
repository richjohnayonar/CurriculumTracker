<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPED;

use App\Models\School;
use App\Models\SPEDProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class SPEDViewProgramReport extends Component
{
    use WithPagination;
    
    public $SPEDProgram;
    public $SPEDProgramID;
    public $school;

     public function mount($id)
    {
        // Retrieve the academic track data based on the provided ID
        $this->SPEDProgramID = $id;
        $this->SPEDProgram = SPEDProgramModel::findOrFail($id);
        $this->school = School::findOrFail($this->SPEDProgram->school_id);
    }

      public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 

    public function render()
    {
        return view('livewire.reports.special-cur-program.s-p-e-d.s-p-e-d-view-program-report',[
            'school'=> $this->school,
        ]);
    }
}
