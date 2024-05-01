<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\AllReport;

use App\Models\SSESProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class SpecificSses extends Component
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
        $ssesByGradeLvls = SSESProgramModel::with('school')
            ->where('grade_lvl', $this->uniqueGradeLvl)
            ->paginate(5);
        return view('livewire.reports.special-cur-program.all-report.specific-sses', [
        'ssesByGradeLvls' => $ssesByGradeLvls,
        ]);
    }
}
