<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserInfo extends Component
{
     use WithPagination;
    
    public $search = '';
    public $isEditModalOpen = false;
    public $userID;
    public $userRole;

    protected $paginationTheme = 'tailwind';

    public function closeModal(){
        $this->isEditModalOpen = false;
    }

      public function updatingSearch()
    {
        $this->resetPage();
    }
    
      public function editrole($userId)
    {
        $user = User::findOrFail($userId);
        $this->userRole = $user->role;
        $this->userID = $user->id;
        $this->isEditModalOpen = true;
    }

    public function UpdateNewRole(){
        $this->userRole = strtolower(str_replace(' ', '', $this->userRole));
        $user = User::findOrFail($this->userID);
        $user->role = $this->userRole;
        $user->save();
        
        // Hide the modal
        $this->isEditModalOpen = false;
    }

    public function render()
    {
        return view('livewire.admin.user-info', [
        'users' => User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(5),
        ]);
    }
}
