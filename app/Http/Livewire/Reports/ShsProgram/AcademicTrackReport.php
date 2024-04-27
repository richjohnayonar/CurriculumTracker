<?php

namespace App\Http\Livewire\Reports\ShsProgram;

use App\Models\AcademicTrack;
use Livewire\Component;
use Livewire\WithPagination;

class AcademicTrackReport extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = ['deleteRecord'];
 
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
         // Find the Academic Track by ID
        if($componentIdentifier !== 'acadDelete'){
            return;
        }
        $academicTrack = AcademicTrack::findOrFail($id);
        
        // Delete the Academic Track
        $academicTrack->delete();
        $this->emit('showNotifications', [
        'type' => 'success',
        'message' => 'Record Deleted',
    ]);
    }

    public function render()
    {
        return view('livewire.reports.shs-program.academic-track-report', [
        'AcademicTracks' => AcademicTrack::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('strand', 'like', '%' . $this->search . '%')
            ->paginate(5)
        ]);

    }
}

