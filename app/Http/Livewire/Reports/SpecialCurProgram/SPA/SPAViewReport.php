<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPA;

use App\Models\School;
use App\Models\SPAModel;
use Livewire\Component;
use Livewire\WithPagination;

class SPAViewReport extends Component
{
    use WithPagination;

    public $SPA;
    public $spaID;
    public $school;

    public function mount($id)
    {
        // Retrieve the academic track data based on the provided ID
        $this->spaID = $id;
        $this->SPA = SPAModel::findOrFail($id);
        $this->school = School::findOrFail($this->SPA->school_id);
    }

    
    public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 

    public function render()
    {
        return view('livewire.reports.special-cur-program.s-p-a.s-p-a-view-report',[
            'school'=> $this->school,
        ]);
    }
}
