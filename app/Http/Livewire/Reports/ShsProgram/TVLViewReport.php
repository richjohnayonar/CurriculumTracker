<?php

namespace App\Http\Livewire\Reports\ShsProgram;

use App\Models\NCPasserName;
use App\Models\School;
use App\Models\TVLProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class TVLViewReport extends Component
{
    use WithPagination;
    public $TVLTrack;
    public $TVLTrackID;
    public $selectedSchool;
    public $full_name;
    public $selectedNCPasserId;
    public $selectedNCPassers = [];
    public $search = '';
    public $selectAll = false;

    protected $NCPassers; // Make dostPassers property protected

    public function deleteSelectedNCPassers()
    {
        // Find the DOST Passers records based on the selected strand
        $NCPassersToDelete = NCPasserName::where('tvlTrack_id', $this->TVLTrack->id)
        ->whereIn('id', $this->selectedNCPassers)
        ->get();

        // Delete selected DOST Passers records
        foreach ($NCPassersToDelete as $NCPasser) {
            $NCPasser->delete();
        }

        // Decrement academic passers number based on the number of selected DOST Passers to delete
        $this->TVLTrack->decrement('total_NC_passer', $NCPassersToDelete->count());

        // Clear selected DOST Passers array
        $this->selectedNCPassers = [];

        // Refresh the DOST Passers data
        $this->NCPassers = NCPasserName::where('tvlTrack_id', $this->TVLTrack->id)->paginate(5);

        $this->selectAll = false;
    }

    public function EditFullName($id){
        $NCFullName =  NCPasserName::findOrFail( $id);
        $this->selectedNCPasserId = $id;
        $this->full_name = $NCFullName->full_name;
        $this->emit('showEditModal');
    }

    public function updateNCPasserName()
    {
        // Update the full name in the database
            $NcFullName = NCPasserName::findOrFail($this->selectedNCPasserId);
            $NcFullName->full_name = $this->full_name;
            $NcFullName->save();
            // Hide the modal
            $this->emit('hideEditModal');
    }

    public function toggleSelectAll($checked)
    {
        if ($checked) {     
            $this->selectedNCPassers = NCPasserName::pluck('id')->toArray();
        } else {
            $this->selectedNCPassers = [];
        }
    }

      public function updatingSearch()
    {
        $this->resetPage();
    }

     public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 
    
    public function mount($id)
    {
        // Retrieve the academic track data based on the provided ID
        $this->TVLTrackID = $id;
        $this->TVLTrack = TVLProgramModel::findOrFail($id);
    }

    public function render()
    {
        $NCPasserQuery = NCPasserName::where('tvlTrack_id', $this->TVLTrack->id);
        $NCPasserQuery->where('full_name', 'like', '%' . $this->search . '%');
        $NCPassers = $NCPasserQuery->paginate(5);
        $schools = School::all();

        
        return view('livewire.reports.shs-program.t-v-l-view-report', [
            'NCPassers'=> $NCPassers,
            'schools' => $schools,
        ]);
    }
}
