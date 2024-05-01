<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\AllReport;

use App\Models\SPAModel;
use Livewire\Component;
use Livewire\WithPagination;

class SpecificSPA extends Component
{
    use WithPagination;
    public $uniqueGradeLvl;

    public function mount($uniqueGradeLvl)
    {
        $this->uniqueGradeLvl = urldecode($uniqueGradeLvl);
    }
    
      public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 
    public function render()
    {
        $SPAByGradeLvls = SPAModel::with('school')
            ->where('grade_lvl', $this->uniqueGradeLvl)
            ->paginate(5);
        return view('livewire.reports.special-cur-program.all-report.specific-s-p-a', [
        'SPAByGradeLvls' => $SPAByGradeLvls,
        ]);
    }
}
