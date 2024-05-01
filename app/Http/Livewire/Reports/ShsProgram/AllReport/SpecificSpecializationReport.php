<?php

namespace App\Http\Livewire\Reports\ShsProgram\AllReport;

use App\Models\TVLProgramModel;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class SpecificSpecializationReport extends Component
{
    use WithPagination;
    public $uniqueSpecialization;

   
    public function mount($uniqueSpecialization)
    {
        $this->uniqueSpecialization = urldecode($uniqueSpecialization);
    }
    
      public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 

    public function render()
    {
         $tvlTracks = TVLProgramModel::with('school')
            ->where('specialization', $this->uniqueSpecialization)
            ->paginate(5);
        return view('livewire.reports.shs-program.all-report.specific-specialization-report', [
        'tvlTracks' => $tvlTracks,
        ]);
    }
}
