<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPJ;

use App\Models\School;
use App\Models\SPJProgramModel;
use Livewire\Component;

class SPJEditProgramReport extends Component
{
    public $selectedSchool;
    public $SPJProgram;
    public $SPJProgramID;
    public $school;
    public $school_year_start;
    public $school_year_end;
    public $grade_lvl;
    public $total_male_enrolled;
    public $total_female_enrolled;
    public $overall_enrolled;
    
    protected $listeners = ['SSESEditSchoolSelect2', 'updateRecord'];

    public function confirmUpdate(){
        $this->emit('confirmUpdate');
    }


    public function SSESEditSchoolSelect2($value)
    {
        $this->selectedSchool = $value;
    }

     public function mount($id)
    {
        $this->SPJProgram = SPJProgramModel::findOrFail($id);
        $this->SPJProgramID = $id;
        $this->school_year_start = $this->SPJProgram->school_year_start;
        $this->school_year_end = $this->SPJProgram->school_year_end;
        $this->grade_lvl = $this->SPJProgram->grade_lvl;
        $this->total_male_enrolled = $this->SPJProgram->no_enrolled_male_stud;
        $this->total_female_enrolled = $this->SPJProgram->no_enrolled_female_stud;
        $this->overall_enrolled = $this->SPJProgram->overall_enrolled;
        $this->school=School::findOrFail($this->SPJProgram->school_id);
        $this->selectedSchool = $this->school->id;
    }

     public function updateRecord(){
        try{
          $SPJDB = SPJProgramModel::findOrFail($this->SPJProgramID);

        // Check if any changes have been made
        $changesMade = 
            $SPJDB->school_id != $this->selectedSchool ||
            $SPJDB->school_year_start != $this->school_year_start ||
            $SPJDB->school_year_end != $this->school_year_end ||
            $SPJDB->grade_lvl != $this->grade_lvl ||
            $SPJDB->no_enrolled_male_stud != $this->total_male_enrolled ||
            $SPJDB->no_enrolled_female_stud != $this->total_female_enrolled ||
            $SPJDB->overall_enrolled != $this->overall_enrolled;

        // If no changes have been made, proceed with updating the record without further checks
        if (!$changesMade) {
            // Update the ALS record to mark as "updated" even if there are no actual changes
            $SPJDB->touch(); // Update the timestamp to mark as updated
            $SPJDB->save();
            
            // Optionally, you can provide feedback to the user that the record has been "updated"
            // For example:
            $this->emit('showNotifications', [
                'type' => 'success',
                'message' => 'Record updated',
            ]);
            return;
        }

          // Extract year from the input date
        $inputYear = date('Y', strtotime($this->school_year_start));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecord = SPJProgramModel::where('id', '!=', $this->SPJProgramID)
            ->where('school_id', $this->selectedSchool)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            $this->emit('showNotifications', [
                'type' => 'error',
                'message' => 'Failed to update, record alreay exist on database',
            ]);
            
            return;
        }
        
         $this->SPJProgram->update([
            'school_id' => $this->selectedSchool,
            'school_year_start' => $this->school_year_start,
            'school_year_end' => $this->school_year_end,
            'grade_lvl' => $this->grade_lvl,
            'no_enrolled_male_stud' => $this->total_male_enrolled,
            'no_enrolled_female_stud' => $this->total_female_enrolled,
            'overall_enrolled' => $this->overall_enrolled,
        ]);

        $this->emit('showNotifications', [
                'type' => 'success',
                'message' => 'Record updated',
        ]);
        }catch (\Exception $e){
            // Catch any exceptions
            $this->emit('showNotifications', [
                'type' => 'error',
                'message' => 'Internal Server Error',
            ]);
        }
    }

    public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    }
    
    public function updated(){
        if($this->total_male_enrolled === ''){
            $this->total_male_enrolled = 0;
        }elseif($this->total_female_enrolled === ''){
            $this->total_female_enrolled = 0;
        }
        $this->overall_enrolled = $this->total_male_enrolled + $this->total_female_enrolled;
    }

    public function render()
    {
        $schools = School::all();
        return view('livewire.reports.special-cur-program.s-p-j.s-p-j-edit-program-report',[
            'schools' => $schools,
        ]);
    }
}
