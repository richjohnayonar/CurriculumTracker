<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPJ;

use App\Models\School;
use App\Models\SPJProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class SPJViewProgramReport extends Component
{
    use WithPagination;

    public $SPJProgram;
    public $SPGProgramID;
    public $school;

    public function mount($id)
    {
        $this->SPGProgramID = $id;
        $this->SPJProgram = SPJProgramModel::findOrFail($id);
        $this->school = School::findOrFail($this->SPJProgram->school_id);
    }

      public function navigateTo($route)
    {
        return redirect()->to($route);
    } 
    public function render()
    {
        return view('livewire.reports.special-cur-program.s-p-j.s-p-j-view-program-report',[
            'school'=> $this->school,
        ]);
    }
}
