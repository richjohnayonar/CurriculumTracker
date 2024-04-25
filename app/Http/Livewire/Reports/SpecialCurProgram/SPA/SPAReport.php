<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPA;

use App\Models\SPAModel;
use Livewire\Component;
use Livewire\WithPagination;

class SPAReport extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteSPA($id){
         // Find the Academic Track by ID
        $SPA = SPAModel::findOrFail($id);
        
        // Delete the Academic Track
        $SPA->delete();
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
        return view('livewire.reports.special-cur-program.s-p-a.s-p-a-report', [
        'SPAs' => SPAModel::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('grade_lvl', 'like', '%' . $this->search . '%')
            ->paginate(5)
        ]);
    }
}
