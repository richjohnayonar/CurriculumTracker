<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\STEProgramModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class STEProgram extends Component
{
    public $grade_lvl = 'Grade 7';
    public $scYearStart;
    public $scYearEnd;
    public $overallEnrolled = 0;
    public $enrolledMale =  0;
    public $enrolledFemale = 0;
    public $selectedSchool;

    protected $listeners = ['SSESAddSchoolSelect2'];

    public function SSESAddSchoolSelect2($value)
    {
        $this->selectedSchool = $value;
    }

    public function updated(){
        $this->overallEnrolled = $this->enrolledMale + $this->enrolledFemale;
    }

      public function savePost(){
        
        $userId = Auth::id();

         // Extract year from the input date
        $inputYear = date('Y', strtotime($this->scYearStart));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecord = STEProgramModel::where('user_id', $userId)
            ->where('school_id', $this->selectedSchool)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            dd('Record already exists.');
        }

        $SSESProgram = new STEProgramModel();
        $SSESProgram->school_id = $this->selectedSchool;
        $SSESProgram->user_id = $userId;
        $SSESProgram->grade_lvl = $this->grade_lvl;
        $SSESProgram->school_year_start = $this->scYearStart;
        $SSESProgram->school_year_end = $this->scYearEnd;
        $SSESProgram->no_enrolled_male_stud = $this->enrolledMale;
        $SSESProgram->no_enrolled_female_stud = $this->enrolledFemale;
        $SSESProgram->overall_enrolled = $this->overallEnrolled;

        $SSESProgram->save();
    }
    
    public function render()
    {
        $schools = School::all();
        return view('livewire.s-t-e-program',[ 
            'schools' => $schools,
        ]);
    }
}
