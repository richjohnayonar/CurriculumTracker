<?php

namespace App\Http\Livewire\Reports\ShsProgram;

use App\Models\TVLProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class TVLTrackReport extends Component
{
    use WithPagination;
    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function navigateTo($link, $id)
    {
        // Navigate to the specified route
        return redirect()->to("/{$link}/{$id}");
    }  

    public function deleteTVLTrack($id){
         // Find the Academic Track by ID
        $academicTrack = TVLProgramModel::findOrFail($id);
        
        // Delete the Academic Track
        $academicTrack->delete();
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
            ->paginate(5)
        ]);
    }
}
