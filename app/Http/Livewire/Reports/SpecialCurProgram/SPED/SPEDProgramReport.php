<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPED;

use App\Models\SPEDProgramModel;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class SPEDProgramReport extends Component
{
     use WithPagination;

    public $search = '';

    protected $listeners = ['deleteRecord'];
    protected $deleteIdentifier = 'spedDelete';

    public function deleteRecord($id, $componentIdentifier){
        if(!Hash::check($this->deleteIdentifier, $componentIdentifier)){
            return;
        }

         // Find the Academic Track by ID
        $SPEDProgram = SPEDProgramModel::findOrFail($id);
        
        // Delete the Academic Track
        $SPEDProgram->delete();

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
        return view('livewire.reports.special-cur-program.s-p-e-d.s-p-e-d-program-report', [
        'SPEDPrograms' => SPEDProgramModel::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('type_of_learners', 'like', '%' . $this->search . '%')
            ->paginate(5),
            'deleteIdentifier' => $this->hashedDeleteIdentifier(),
        ]);
    }
}
