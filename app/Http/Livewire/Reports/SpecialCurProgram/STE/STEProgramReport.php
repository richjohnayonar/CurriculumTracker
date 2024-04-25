<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\STE;

use App\Models\STEProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class STEProgramReport extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteSTETrack($id){
         // Find the Academic Track by ID
        $STEProgram = STEProgramModel::findOrFail($id);
        
        // Delete the Academic Track
        $STEProgram->delete();
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
        return view('livewire.reports.special-cur-program.s-t-e.s-t-e-program-report', [
        'STEPrograms' => STEProgramModel::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('grade_lvl', 'like', '%' . $this->search . '%')
            ->paginate(5)
        ]);
    }
}
