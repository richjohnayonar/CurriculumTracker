<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\SPA;

use App\Models\School;
use App\Models\SPAModel;
use Livewire\Component;

class SPAEditReport extends Component
{
    public $selectedSchool;
    public $SPA;
    public $SPAID;
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
        $this->SPA = SPAModel::findOrFail($id);
        $this->SPAID = $id;
        $this->school_year_start = $this->SPA->school_year_start;
        $this->school_year_end = $this->SPA->school_year_end;
        $this->grade_lvl = $this->SPA->grade_lvl;
        $this->total_male_enrolled = $this->SPA->no_enrolled_male_stud;
        $this->total_female_enrolled = $this->SPA->no_enrolled_female_stud;
        $this->overall_enrolled = $this->SPA->overall_enrolled;
        $this->school=School::findOrFail($this->SPA->school_id);
        $this->selectedSchool = $this->school->id;
    }

    public function update(){

          // Find the ALS record to update
        $SPADB = SPAModel::findOrFail($this->SPAID);

        // Check if any changes have been made
        $changesMade = 
            $SPADB->school_id != $this->selectedSchool ||
            $SPADB->school_year_start != $this->school_year_start ||
            $SPADB->school_year_end != $this->school_year_end ||
            $SPADB->grade_lvl != $this->grade_lvl ||
            $SPADB->no_enrolled_male_stud != $this->total_male_enrolled ||
            $SPADB->no_enrolled_female_stud != $this->total_female_enrolled ||
            $SPADB->overall_enrolled != $this->overall_enrolled;

        // If no changes have been made, proceed with updating the record without further checks
        if (!$changesMade) {
            // Update the ALS record to mark as "updated" even if there are no actual changes
            $SPADB->touch(); // Update the timestamp to mark as updated
            $SPADB->save();
            
            // Optionally, you can provide feedback to the user that the record has been "updated"
            // For example:
            session()->flash('message', 'Record updated.');
                
            return;
        }

          // Extract year from the input date
        $inputYear = date('Y', strtotime($this->school_year_start));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecord = SPAModel::where('id', '!=', $this->SPAID)
            ->where('school_id', $this->selectedSchool)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();
        
        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            dd('Record already exists.');
        }
            
         $this->SPA->update([
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
        return view('livewire.reports.special-cur-program.s-p-a.s-p-a-edit-report',[
            'schools' => $schools,
        ]);
    }
}
