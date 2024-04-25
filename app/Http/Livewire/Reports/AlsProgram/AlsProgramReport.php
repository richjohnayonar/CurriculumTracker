<?php

namespace App\Http\Livewire\Reports\AlsProgram;

use App\Models\als;
use Livewire\Component;
use Livewire\WithPagination;

class AlsProgramReport extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $als;
    public $alsID;
    public $school_lvl;
    public $scYearStart;
    public $scYearEnd;
    public $overallEnrolled;
    public $enrolledMale;
    public $enrolledFemale;
    public $isEditModalOpen = false;

    public function updated(){
        $this->overallEnrolled = $this->enrolledMale + $this->enrolledFemale;
    }

    public function closeModal(){
        $this->isEditModalOpen = false;
    }

    public function deleteAlsRecord($id){
         // Find the Academic Track by ID
        $ArabLanguageProg = als::findOrFail($id);
        
        // Delete the Academic Track
        $ArabLanguageProg->delete();
    }

    public function navigateTo($link, $id)
    {
        // Navigate to the specified route
        return redirect()->to("/{$link}/{$id}");
    } 

     public function EditArabIslamLang($id){
        $als =  als::findOrFail( $id);
        $this->alsID = $id;
        $this->school_lvl = $als->school_lvl;
        $this->scYearStart = $als->school_year_start;
        $this->scYearEnd = $als->school_year_end;
        $this->enrolledMale = $als->no_enrolled_male_stud;
        $this->enrolledFemale = $als->no_enrolled_female_stud;
        $this->overallEnrolled = $als->overall_enrolled;
        $this->isEditModalOpen = true;
    }
    
    // public function confirmUpdate()
    // {
    //     // Update the full name in the database
    //         $alsDB = als::findOrFail($this->alsID);
    //         $alsDB->school_lvl = $this->school_lvl;
    //         $alsDB->school_year_start = $this->scYearStart;
    //         $alsDB->school_year_end = $this->scYearEnd;
    //         $alsDB->no_enrolled_male_stud = $this->enrolledMale;
    //         $alsDB->no_enrolled_female_stud = $this->enrolledFemale;
    //         $alsDB->overall_enrolled = $this->overallEnrolled;
    //         $alsDB->save();
    //         // Hide the modal
    //             $this->isEditModalOpen = false;
    // }

    public function confirmUpdate()
    {
        // Find the ALS record to update
        $alsDB = als::findOrFail($this->alsID);

        // Check if any changes have been made
        $changesMade = 
            $alsDB->school_lvl != $this->school_lvl ||
            $alsDB->school_year_start != $this->scYearStart ||
            $alsDB->school_year_end != $this->scYearEnd ||
            $alsDB->no_enrolled_male_stud != $this->enrolledMale ||
            $alsDB->no_enrolled_female_stud != $this->enrolledFemale ||
            $alsDB->overall_enrolled != $this->overallEnrolled;

        // If no changes have been made, proceed with updating the record without further checks
        if (!$changesMade) {
            // Update the ALS record to mark as "updated" even if there are no actual changes
            $alsDB->touch(); // Update the timestamp to mark as updated
            $alsDB->save();
            
            // Hide the modal
            $this->isEditModalOpen = false;
            
            // Optionally, you can provide feedback to the user that the record has been "updated"
            // For example:
            session()->flash('message', 'Record updated.');
            
            return;
        }

        // Check if there's an existing record with the same attributes excluding the ID being updated
        $existingRecord = als::where('id', '!=', $this->alsID)
            ->where('school_lvl', $this->school_lvl)
            ->whereYear('school_year_start', $this->scYearStart)
            ->first();

        // If an existing record is found, prevent updating with the same data
        if ($existingRecord) {
            // You can add any specific action here, such as showing an error message
            // or redirecting back with a message indicating the duplicate record.
            // For now, let's just halt further processing.
            dd('Record already exists with the same attributes.');
        }

        // Update the ALS record with the new data
        $alsDB->school_lvl = $this->school_lvl;
        $alsDB->school_year_start = $this->scYearStart;
        $alsDB->school_year_end = $this->scYearEnd;
        $alsDB->no_enrolled_male_stud = $this->enrolledMale;
        $alsDB->no_enrolled_female_stud = $this->enrolledFemale;
        $alsDB->overall_enrolled = $this->overallEnrolled;
        $alsDB->save();

        // Hide the modal
        $this->isEditModalOpen = false;

        // Optionally, you can provide feedback to the user that the record has been updated
        session()->flash('message', 'Record updated.');
    }


      public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.reports.als-program.als-program-report', [
        'alss' => als::where('school_lvl', 'like', '%' . $this->search . '%')
            ->paginate(5),
        ]);
    }
}
