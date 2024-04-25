<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SSES;

use App\Models\School;
use App\Models\SSESProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class SSESViewReport extends Component
{
    use WithPagination;

    public $SSESProgram;
    public $SSESProgramID;
    public $school;

    public function mount($id)
    {
        // Retrieve the academic track data based on the provided ID
        $this->SSESProgramID = $id;
        $this->SSESProgram = SSESProgramModel::findOrFail($id);
        $this->school = School::findOrFail($this->SSESProgram->school_id);
    }

      public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 

    public function render()
    {
        return view('livewire.reports.special-cur-program.s-s-e-s.s-s-e-s-view-report',[
            'school'=> $this->school,
        ]);
    }
}
