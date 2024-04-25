<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SSES;

use App\Models\School;
use App\Models\SSESProgramModel;
use Livewire\Component;

class SSESEditReport extends Component
{
    public $selectedSchool;
    public $SSESProgram;
    public $SSESID;
    public $school;
    public $school_year_start;
    public $school_year_end;
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
        $this->SSESProgram = SSESProgramModel::findOrFail($id);
        $this->SSESID = $id;
        $this->school_year_start = $this->SSESProgram->school_year_start;
        $this->school_year_end = $this->SSESProgram->school_year_end;
        $this->grade_lvl = $this->SSESProgram->grade_lvl;
        $this->total_male_enrolled = $this->SSESProgram->no_enrolled_male_stud;
        $this->total_female_enrolled = $this->SSESProgram->no_enrolled_female_stud;
        $this->overall_enrolled = $this->SSESProgram->overall_enrolled;
        $this->pisay_passers = $this->SSESProgram->pisay_passers;
        $this->ste_passers = $this->SSESProgram->ste_passers;
        $this->school=School::findOrFail($this->SSESProgram->school_id);
        $this->selectedSchool = $this->school->id;
    }

      public function update(){

         // Find the ALS record to update
        $SSESDB = SSESProgramModel::findOrFail($this->SSESID);

        // Check if any changes have been made
        $changesMade = 
            $SSESDB->school_id != $this->selectedSchool ||
            $SSESDB->school_year_start != $this->school_year_start ||
            $SSESDB->school_year_end != $this->school_year_end ||
            $SSESDB->grade_lvl != $this->grade_lvl ||
            $SSESDB->no_enrolled_male_stud != $this->total_male_enrolled ||
            $SSESDB->no_enrolled_female_stud != $this->total_female_enrolled ||
            $SSESDB->overall_enrolled != $this->overall_enrolled;

        // If no changes have been made, proceed with updating the record without further checks
        if (!$changesMade) {
            // Update the ALS record to mark as "updated" even if there are no actual changes
            $SSESDB->touch(); // Update the timestamp to mark as updated
            $SSESDB->save();
            
            // Optionally, you can provide feedback to the user that the record has been "updated"
            // For example:
            session()->flash('message', 'Record updated.');
                
            return;
        }

          // Extract year from the input date
        $inputYear = date('Y', strtotime($this->school_year_start));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecord = SSESProgramModel::where('id', '!=', $this->SSESID)
            ->where('school_id', $this->selectedSchool)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            dd('Record already exists.');
        }

        if($this->grade_lvl !== 'Grade 6'){
            $this->pisay_passers = NULL;
            $this->ste_passers = NULL;
        }
         $this->SSESProgram->update([
            'school_id' => $this->selectedSchool,
            'school_year_start' => $this->school_year_start,
            'school_year_end' => $this->school_year_end,
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
        return view('livewire.reports.special-cur-program.s-s-e-s.s-s-e-s-edit-report', [
            'schools' => $schools,
        ]);
    }
}
