<?php

namespace App\Http\Livewire\Reports\ShsProgram;

use App\Models\AcademicTrack;
use App\Models\DostPasserName;
use App\Models\School;
use Illuminate\Queue\ListenerOptions;
use Livewire\Component;
use Livewire\WithPagination;

class AcademicTrackViewReport extends Component
{
    use WithPagination;
    public $academicTrack;
    public $academicTrackId;
    public $school;
    public $full_name;
    public $selectedDostPasserId;
    public $selectedDostPassers = [];
    public $selectAll = false;
    public $search = '';

    protected $listeners = ['deleteRecordPassers'];

    public function confirmDelete(){
        $this->emit("confirmDeletePassers");
    }
    public function deleteRecordPassers()
    {
        // Find the DOST Passers records based on the selected strand
        $dostPassersToDelete = DostPasserName::where('academicTrack_id', $this->academicTrack->id)
                ->whereIn('id', $this->selectedDostPassers)
                ->get();

        // Delete selected DOST Passers records
        foreach ($dostPassersToDelete as $dostPasser) {
            $dostPasser->delete();
        }

        // Decrement academic passers number based on the number of selected DOST Passers to delete
        $this->academicTrack->decrement('total_dost_passer', $dostPassersToDelete->count());

        // Clear selected DOST Passers array
        $this->selectedDostPassers = [];

        // Refresh the DOST Passers data
        $this->dostPassers = DostPasserName::where('academicTrack_id', $this->academicTrack->id)->paginate(5);

        $this->selectAll = false;
         $this->emit('showNotifications', [
        'type' => 'success',
        'message' => 'Record Deleted',
        ]);
    }

    
    protected $dostPassers; // Make dostPassers property protected

    public function EditFullName($id){
        $dostFullName =  DostPasserName::findOrFail( $id);
        $this->selectedDostPasserId = $id;
        $this->full_name = $dostFullName->full_name;
        $this->emit('showEditModal');
    }

    public function toggleSelectAll($checked)
    {
        if ($checked) {
           $this->selectedDostPassers = DostPasserName::where('academicTrack_id', $this->academicTrack->id)->pluck('id')->toArray();
        } else {
            $this->selectedDostPassers = [];
        }
    }

    public function updateDOSTPasserName()
    {
        // Update the full name in the database
            $dostFullName = DostPasserName::findOrFail($this->selectedDostPasserId);
            $dostFullName->full_name = $this->full_name;
            $dostFullName->save();
            // Hide the modal
            $this->emit('hideEditModal');
            $this->emit('showNotifications', [
            'type' => 'success',
            'message' => 'Record Updated.'  ,
            ]);
    }

    public function mount($id)
    {
        // Retrieve the academic track data based on the provided ID
        $this->academicTrackId = $id;
        $this->academicTrack = AcademicTrack::findOrFail($id);
        $this->school = School::findOrFail($this->academicTrack->school_id);
    }

     public function updatedSearch()
    {
        // Surround the search query with % to search for it as a phrase
        $searchPhrase = '%' . $this->search . '%';
        
        // When the search query changes, fetch the DOST Passers based on the new query
        $this->dostPassers = DostPasserName::where('academicTrack_id', $this->academicTrack->id)
                            ->where('full_name', 'like', $searchPhrase)
                            ->paginate(5);

        // Reset pagination to the first page after updating the search results
        $this->resetPage();
    }

      public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 

    // public function deleteDostPasser($id){
    //      // Find the DostPasser model instance
    //     $dostPasser = DostPasserName::findOrFail($id);

    //     // Delete the DostPasser
    //     $dostPasser->delete();

    //     // Optionally, you can emit an event or perform any other action after deletion
    //     $this->academicTrack->decrement('total_dost_passer');

    //     // Refresh the DostPassers data
    //     $this->dostPassers = DostPasserName::all();
    // }

    public function render()
    {
        return view('livewire.reports.shs-program.academic-track-view-report', [
            'school'=> $this->school,
            'dostPassers'=> DostPasserName::where('academicTrack_id', $this->academicTrack->id)->Where('full_name', 'like', '%' . $this->search . '%')->paginate(5),
        ]);
    }
}
