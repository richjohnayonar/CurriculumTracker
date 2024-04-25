<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\STE;

use App\Models\School;
use App\Models\STEProgramModel;
use Livewire\Component;

class STEEditProgramReport extends Component
{
    public $selectedSchool;
    public $STEProgram;
    public $STEProgramID;
    public $school;
    public $school_year_start;
    public $school_year_end;
    public $grade_lvl;
    public $total_male_enrolled;
    public $total_female_enrolled;
    public $overall_enrolled;

    protected $listeners = ['SSESEditSchoolSelect2'];

    public function SSESEditSchoolSelect2($value)
    {
        $this->selectedSchool = $value;
    }

    
    public function mount($id)
    {
        $this->STEProgram = STEProgramModel::findOrFail($id);
        $this->STEProgramID = $id;
        $this->school_year_start = $this->STEProgram->school_year_start;
        $this->school_year_end = $this->STEProgram->school_year_end;
        $this->grade_lvl = $this->STEProgram->grade_lvl;
        $this->total_male_enrolled = $this->STEProgram->no_enrolled_male_stud;
        $this->total_female_enrolled = $this->STEProgram->no_enrolled_female_stud;
        $this->overall_enrolled = $this->STEProgram->overall_enrolled;
        $this->school=School::findOrFail($this->STEProgram->school_id);
        $this->selectedSchool = $this->school->id;
    }

    public function update(){
          // Find the ALS record to update
        $STEDB = STEProgramModel::findOrFail($this->STEProgramID);

        // Check if any changes have been made
        $changesMade = 
            $STEDB->school_id != $this->selectedSchool ||
            $STEDB->school_year_start != $this->school_year_start ||
            $STEDB->school_year_end != $this->school_year_end ||
            $STEDB->grade_lvl != $this->grade_lvl ||
            $STEDB->no_enrolled_male_stud != $this->total_male_enrolled ||
            $STEDB->no_enrolled_female_stud != $this->total_female_enrolled ||
            $STEDB->overall_enrolled != $this->overall_enrolled;

        // If no changes have been made, proceed with updating the record without further checks
        if (!$changesMade) {
            // Update the ALS record to mark as "updated" even if there are no actual changes
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
        $existingRecord = STEProgramModel::where('id', '!=', $this->STEProgramID)
            ->where('school_id', $this->selectedSchool)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            dd('Record already exists.');
        }

         $this->STEProgram->update([
            'school_id' => $this->selectedSchool,
            'school_year_start' => $this->school_year_start,
            'school_year_end' => $this->school_year_end,
            'grade_lvl' => $this->grade_lvl,
            'no_enrolled_male_stud' => $this->total_male_enrolled,
            'no_enrolled_female_stud' => $this->total_female_enrolled,
            'overall_enrolled' => $this->overall_enrolled,
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
        return view('livewire.reports.special-cur-program.s-t-e.s-t-e-edit-program-report', [
            'schools' => $schools,
        ]);
    }
}
