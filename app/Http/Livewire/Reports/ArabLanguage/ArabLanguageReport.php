<?php

namespace App\Http\Livewire\Reports\ArabLanguage;

use App\Models\ArabicLanguage;
use App\Models\School;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class ArabLanguageReport extends Component
{
    use WithPagination;

    public $search = '';
    public $ArabIslamID;
    public $grade_lvl;
    public $scYearStart;
    public $scYearEnd;
    public $overallEnrolled;
    public $enrolledMale;
    public $enrolledFemale;
    public $selectedSchool;
    public $isEditModalOpen = false;
    
    protected $deleteIdentifier = 'arabDelete';

    protected $listeners = ['EditAcademicSelect2', 'deleteRecord', 'updateRecord'];

    public function confirmUpdate(){
        $this->emit('confirmUpdate');
    }

    public function EditAcademicSelect2($value)
    {
        $this->selectedSchool = $value;
    }

    public function updated(){
        $this->overallEnrolled = $this->enrolledMale + $this->enrolledFemale;
    }

    public function closeModal(){
        $this->isEditModalOpen = false;
    }

    public function deleteRecord($id, $componentIdentifier){
        if(!Hash::check($this->deleteIdentifier, $componentIdentifier)){
            return;
        }

         // Find the Academic Track by ID
        $ArabLanguageProg = ArabicLanguage::findOrFail($id);
        
        // Delete the Academic Track
        $ArabLanguageProg->delete();

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
     
    public function EditArabIslamLang($id){
        $arabIslam =  ArabicLanguage::findOrFail( $id);
        $this->selectedSchool = $arabIslam->school_id;
        $this->ArabIslamID = $id;
        $this->scYearStart = $arabIslam->school_year_start;
        $this->scYearEnd = $arabIslam->school_year_end;
        $this->grade_lvl = $arabIslam->grade_lvl;
        $this->enrolledMale = $arabIslam->no_enrolled_male_stud;
        $this->enrolledFemale = $arabIslam->no_enrolled_female_stud;
        $this->overallEnrolled = $arabIslam->overall_enrolled;
        $this->isEditModalOpen = true;
    }
    
    public function updateRecord()
    {

          // Find the ALS record to update
        $arabIslamDb = ArabicLanguage::findOrFail($this->ArabIslamID);

        // Check if any changes have been made
        $changesMade = 
            $arabIslamDb->school_id != $this->selectedSchool ||
            $arabIslamDb->school_year_start != $this->scYearStart ||
            $arabIslamDb->school_year_end != $this->scYearEnd ||
            $arabIslamDb->grade_lvl != $this->grade_lvl ||
            $arabIslamDb->no_enrolled_male_stud != $this->enrolledMale ||
            $arabIslamDb->no_enrolled_female_stud != $this->enrolledFemale ||
            $arabIslamDb->overall_enrolled != $this->overallEnrolled;

        // If no changes have been made, proceed with updating the record without further checks
        if (!$changesMade) {
            // Update the ALS record to mark as "updated" even if there are no actual changes
            $arabIslamDb->touch(); // Update the timestamp to mark as updated
            $arabIslamDb->save();
            
            // Hide the modal
            $this->isEditModalOpen = false;
            
            // Optionally, you can provide feedback to the user that the record has been "updated"
            // For example:
            $this->emit('showNotifications', [
                'type' => 'success',
                'message' => 'Record updated',
            ]);
            return;
        }

              // Extract year from the input date
        $inputYear = date('Y', strtotime($this->scYearStart));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecord = ArabicLanguage::where('id', '!=', $this->ArabIslamID)
            ->where('school_id', $this->selectedSchool)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        // If an existing record is found, prevent updating with the same data
        if ($existingRecord) {
            // You can add any specific action here, such as showing an error message
            // or redirecting back with a message indicating the duplicate record.
            // For now, let's just halt further processing.
            $this->emit('showNotifications', [
                'type' => 'error',
                'message' => 'Failed to update, record alreay exist on database',
            ]);

            return;
        }
        
        // Update the full name in the database
            $ArabIslamDB = ArabicLanguage::findOrFail($this->ArabIslamID);
            $ArabIslamDB->school_id = $this->selectedSchool;
            $ArabIslamDB->school_year_start = $this->scYearStart;
            $ArabIslamDB->school_year_end = $this->scYearEnd;
            $ArabIslamDB->grade_lvl = $this->grade_lvl;
            $ArabIslamDB->no_enrolled_male_stud = $this->enrolledMale;
            $ArabIslamDB->no_enrolled_female_stud = $this->enrolledFemale;
            $ArabIslamDB->overall_enrolled = $this->overallEnrolled;
            $ArabIslamDB->save();
            // Hide the modal
            $this->isEditModalOpen = false;

            $this->emit('showNotifications', [
                'type' => 'success',
                'message' => 'Record updated.',
            ]);
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
        $schools = School::all();
        return view('livewire.reports.arab-language.arab-language-report', [
        'ArabLanguages' => ArabicLanguage::with('school')
            ->whereHas('school', function ($query) {
                $query->where('school_id', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('grade_lvl', 'like', '%' . $this->search . '%')
            ->paginate(5),
        'deleteIdentifier' => $this->hashedDeleteIdentifier(),
        'schools' => $schools,
        ]);
    }
}
