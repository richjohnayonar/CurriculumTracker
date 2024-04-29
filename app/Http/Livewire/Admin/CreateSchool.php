<?php

namespace App\Http\Livewire\Admin;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;

class CreateSchool extends Component
{
     use WithPagination;
    
    public $search = '';
    public $isEditModalOpen = false;
    public $isUpdateMode = false;
    public $schoolId; // For editing
    public $school_school_id;  // For both adding and editing
    public $name = ''; // For both adding and editing

    protected $paginationTheme = 'tailwind';

    public function addNewSchool()
    {
        $this->isUpdateMode = false;
        $this->resetFields(); // Clear input fields
        $this->isEditModalOpen = true;
    }

    public function editSchool($id)
    {
        $this->isUpdateMode = true;
        $this->resetValidation();
        $this->schoolId = $id;
        $school = School::findOrFail($id);
        $this->school_school_id = $school->school_id; 
        $this->name = $school->name; // Populate input field with existing name
        $this->isEditModalOpen = true;
    }

    public function closeModal()
    {
        $this->isEditModalOpen = false;
        $this->resetFields(); // Clear input fields when modal is closed
    }

    public function resetFields()
    {
        $this->name = '';
        $this->school_school_id = '';
    }

    public function saveSchool()
    {
        $validatedData = $this->validate([
            'school_school_id' => 'required',
            'name' => 'required',
        ]);

        if ($this->isUpdateMode) {
            $school = School::findOrFail($this->schoolId);
            $school->school_id = $validatedData['school_school_id'];
            $school->name = $validatedData['name'];
            $school->save();

            $this->emit('showNotifications', [
            'type' => 'success',
            'message' => 'School Updated',
        ]);
        } else {
            School::create([
                'school_id' => $validatedData['school_school_id'],
                'name' => $validatedData['name'],
            ]);
            $this->emit('showNotifications', [
            'type' => 'success',
            'message' => 'School Added',
        ]);
        }

        // Hide the modal
        $this->isEditModalOpen = false;
        $this->resetFields(); // Clear input fields
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.create-school', [
        'schools' => School::where('school_id', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->paginate(5),
        ]);
    }
}
