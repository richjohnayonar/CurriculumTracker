<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\AllReport;

use App\Models\SPEDProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class SpecificSped extends Component
{
    use WithPagination;
    public $uniqueLearnerType;

    public function mount($uniqueLeanerTypes)
    {
        $this->uniqueLearnerType = urldecode($uniqueLeanerTypes);
    }
    
      public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 

    public function render()
    {
        $SpedByLearnerTypes = SPEDProgramModel::with('school')
            ->where('type_of_learners', $this->uniqueLearnerType)
            ->paginate(5);
        return view('livewire.reports.special-cur-program.all-report.specific-sped', [
        'SpedByLearnerTypes' => $SpedByLearnerTypes,
        ]);
    }
}
