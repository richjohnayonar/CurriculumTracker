<?php

namespace App\Http\Livewire\Reports\ShsProgram;

use App\Models\TVLProgramModel;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class TVLTrackReport extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = ['deleteRecord'];

    protected $deleteIdentifier = 'tvlDelete';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function navigateTo($link, $id)
    {
        // Navigate to the specified route
        return redirect()->to("/{$link}/{$id}");
    }  

    public function deleteRecord($id, $componentIdentifier){
         if(!Hash::check($this->deleteIdentifier, $componentIdentifier)){
            return;
        }
         // Find the Academic Track by ID
        $academicTrack = TVLProgramModel::findOrFail($id);
        
        // Delete the Academic Track
        $academicTrack->delete();

        $this->emit('showNotifications', [
        'type' => 'success',
        'message' => 'Record Deleted',
        ]);
    }

    protected function hashedDeleteIdentifier()
    {
        return Hash::make($this->deleteIdentifier);
    }


    public function render()
    {
        return view('livewire.reports.shs-program.t-v-l-track-report', [
            'TVLTracks' => TVLProgramModel::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('specialization', 'like', '%' . $this->search . '%')
            ->paginate(5),
            'deleteIdentifier' => $this->hashedDeleteIdentifier(),
        ]);
    }
}
