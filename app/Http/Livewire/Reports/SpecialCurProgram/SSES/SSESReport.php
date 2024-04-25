<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SSES;

use App\Models\SSESProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class SSESReport extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteSSESTrack($id){
         // Find the Academic Track by ID
        $SSESProgram = SSESProgramModel::findOrFail($id);
        
        // Delete the Academic Track
        $SSESProgram->delete();
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
        return view('livewire.reports.special-cur-program.s-s-e-s.s-s-e-s-report', [
        'SSESPrograms' => SSESProgramModel::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('grade_lvl', 'like', '%' . $this->search . '%')
            ->paginate(5)
        ]);
    }
}
