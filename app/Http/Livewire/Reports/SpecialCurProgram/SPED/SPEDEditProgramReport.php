<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPED;

use App\Models\School;
use App\Models\SPEDProgramModel;
use Livewire\Component;

class SPEDEditProgramReport extends Component
{
    public $selectedSchool;
    public $SPEDProgram;
    public $SPEDProgramID;
    public $school;
    public $school_year_start;
    public $school_year_end;
    public $type_of_learners;
    public $grade_lvl;
    public $total_male_enrolled;
    public $total_female_enrolled;
    public $overall_enrolled;
    public $pisay_passers;
    public $ste_passers;

    protected $listeners = ['SSESEditSchoolSelect2'];

    public function SSESEditSchoolSelect2($value)
    {
        $this->selectedSchool = $value;
    }

    public function mount($id)
    {
        $this->SPEDProgram = SPEDProgramModel::findOrFail($id);
        $this->SPEDProgramID = $id;
        $this->school_year_start = $this->SPEDProgram->school_year_start;
        $this->school_year_end = $this->SPEDProgram->school_year_end;
        $this->type_of_learners = $this->SPEDProgram->type_of_learners;
        $this->grade_lvl = $this->SPEDProgram->grade_lvl;
        $this->total_male_enrolled = $this->SPEDProgram->no_enrolled_male_stud;
        $this->total_female_enrolled = $this->SPEDProgram->no_enrolled_female_stud;
        $this->overall_enrolled = $this->SPEDProgram->overall_enrolled;
        $this->pisay_passers = $this->SPEDProgram->pisay_passers;
        $this->ste_passers = $this->SPEDProgram->ste_passers;
        $this->school=School::findOrFail($this->SPEDProgram->school_id);
        $this->selectedSchool = $this->school->id;
    }
    public function update(){

          // Find the ALS record to update
        $STEDB = SPEDProgramModel::findOrFail($this->SPEDProgramID);

        // Check if any changes have been made
        $changesMade = 
            $STEDB->school_id != $this->selectedSchool ||
            $STEDB->school_year_start != $this->school_year_start ||
            $STEDB->school_year_end != $this->school_year_end ||
            $STEDB->type_of_learners != $this->type_of_learners ||
            $STEDB->grade_lvl != $this->grade_lvl ||
            $STEDB->no_enrolled_male_stud != $this->total_male_enrolled ||
            $STEDB->no_enrolled_female_stud != $this->total_female_enrolled ||
            $STEDB->overall_enrolled != $this->overall_enrolled;

        // If no changes have been made, proceed with updating the record without further checks
        if (!$changesMade) {
            $STEDB->touch(); // Update the timestamp to mark as updated
            $STEDB->save();
            
            // Optionally, you can provide feedback to the user that the record has been "updated"
            // For example:
            session()->flash('message', 'Record updated.');
                
            return;
        }

          // Extract year from the input date
        $inputYear = date('Y', strtotime($this->school_year_start));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecordQuery = SPEDProgramModel::where('id', '!=', $this->SPEDProgramID)
        ->where('school_id', $this->selectedSchool)
        ->where('type_of_learners', $this->type_of_learners);

        if ($this->type_of_learners === 'Fast Learners') {
            $existingRecordQuery->where('grade_lvl', $this->grade_lvl);
        }

        $existingRecord = $existingRecordQuery
            ->whereYear('school_year_start', $inputYear)
            ->first();


        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            dd('Record already exists.');
        }

        if($this->type_of_learners !== 'Fast Learners'){
            $this->grade_lvl = NULL;
        }
        if($this->grade_lvl !== 'Grade 6'){
            $this->pisay_passers = NULL;
            $this->ste_passers = NULL;
        }
         $this->SPEDProgram->update([
            'school_id' => $this->selectedSchool,
            'school_year_start' => $this->school_year_start,
            'school_year_end' => $this->school_year_end,
            'type_of_learners' => $this->type_of_learners,
            'grade_lvl' => $this->grade_lvl,
            'no_enrolled_male_stud' => $this->total_male_enrolled,
            'no_enrolled_female_stud' => $this->total_female_enrolled,
            'overall_enrolled' => $this->overall_enrolled,
            'pisay_passers' => $this->pisay_passers,
            'ste_passers' => $this->ste_passers,
        ]);
    }

    public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 

     public function updated(){
        $this->overall_enrolled = $this->total_male_enrolled + $this->total_female_enrolled;
    }
    
    public function render()
    {
        $schools = School::all();
        return view('livewire.reports.special-cur-program.s-p-e-d.s-p-e-d-edit-program-report', [
            'schools' => $schools,
        ]);
    }
}
