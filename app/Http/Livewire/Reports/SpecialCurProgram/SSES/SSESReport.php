<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SSES;

use App\Models\SSESProgramModel;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class SSESReport extends Component
{
    use WithPagination;

    public $search = '';
    
    protected $listeners = ['deleteRecord'];

    protected $deleteIdentifier = 'ssesDelete';

    public function deleteRecord($id, $componentIdentifier){
        if(!Hash::check($this->deleteIdentifier, $componentIdentifier)){
            return;
        }

         // Find the Academic Track by ID
        $SSESProgram = SSESProgramModel::findOrFail($id);
        
        // Delete the Academic Track
        $SSESProgram->delete();

        $this->emit('showNotifications', [
            'type' => 'success',
            'message' => 'Record Deleted',
        ]);
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

      protected function hashedDeleteIdentifier()
    {
        return Hash::make($this->deleteIdentifier);
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
            ->paginate(5),
            'deleteIdentifier' => $this->hashedDeleteIdentifier(),
        ]);
    }
}
