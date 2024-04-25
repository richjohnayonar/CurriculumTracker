<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPJ;

use App\Models\SPJProgramModel;
use Livewire\Component;
use Livewire\WithPagination;

class SPJProgramReport extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteSPJTrack($id){
        $SPGProgram = SPJProgramModel::findOrFail($id);
        $SPGProgram->delete();
    }

    public function navigateTo($link, $id)
    {
        return redirect()->to("/{$link}/{$id}");
    }

      public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.reports.special-cur-program.s-p-j.s-p-j-program-report', [
        'SPJProgams' => SPJProgramModel::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('grade_lvl', 'like', '%' . $this->search . '%')
            ->paginate(5)
        ]);
    }
}
