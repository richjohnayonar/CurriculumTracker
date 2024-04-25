<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPED;

use App\Models\SPEDProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class SPEDProgramReport extends Component
{
     use WithPagination;

    public $search = '';

    public function deleteSPEDTrack($id){
         // Find the Academic Track by ID
        $SPEDProgram = SPEDProgramModel::findOrFail($id);
        
        // Delete the Academic Track
        $SPEDProgram->delete();
    }

    public function navigateTo($link, $id)
    {
        // Navigate to the specified route
        return redirect()->to("/{$link}/{$id}");
    }  
 
      public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.reports.special-cur-program.s-p-e-d.s-p-e-d-program-report', [
        'SPEDPrograms' => SPEDProgramModel::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('type_of_learners', 'like', '%' . $this->search . '%')
            ->paginate(5)
        ]);
    }
}
