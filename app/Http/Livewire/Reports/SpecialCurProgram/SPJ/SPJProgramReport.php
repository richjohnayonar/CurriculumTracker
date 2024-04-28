<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPJ;

use App\Models\SPJProgramModel;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class SPJProgramReport extends Component
{
    use WithPagination;

    public $search = '';
    protected $deleteIdentifier = 'DELETESPJ';

    protected $listeners = ['deleteRecord'];

    public function deleteRecord($id, $componentIdentifier){
        if(!Hash::check($this->deleteIdentifier, $componentIdentifier)){
            return;
        }

        $SPGProgram = SPJProgramModel::findOrFail($id);
        $SPGProgram->delete();

        $this->emit('showNotifications', [
            'type' => 'success',
            'message' => 'Record Deleted',
        ]);
    }

    public function navigateTo($link, $id)
    {
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
        return view('livewire.reports.special-cur-program.s-p-j.s-p-j-program-report', [
        'SPJProgams' => SPJProgramModel::with('school')
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
