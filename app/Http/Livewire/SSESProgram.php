<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\SSESProgramModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SSESProgram extends Component
{
    public $grade_lvl = 'Grade 1';
    public $scYearStart;
    public $scYearEnd;
    public $overallEnrolled = 0;
    public $enrolledMale =  0;
    public $enrolledFemale = 0;
    public $selectedSchool;
    public $pisay_passers;
    public $ste_passers;

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
        $existingRecord = SSESProgramModel::where('user_id', $userId)
            ->where('school_id', $this->selectedSchool)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            dd('Record already exists.');
        }

        $SSESProgram = new SSESProgramModel();
        $SSESProgram->school_id = $this->selectedSchool;
        $SSESProgram->user_id = $userId;
        $SSESProgram->grade_lvl = $this->grade_lvl;
        $SSESProgram->school_year_start = $this->scYearStart;
        $SSESProgram->school_year_end = $this->scYearEnd;
        $SSESProgram->no_enrolled_male_stud = $this->enrolledMale;
        $SSESProgram->no_enrolled_female_stud = $this->enrolledFemale;
        $SSESProgram->overall_enrolled = $this->overallEnrolled;

       
        if($this->grade_lvl === 'Grade 6')
        {
            $SSESProgram->pisay_passers = $this->pisay_passers;
            $SSESProgram->ste_passers = $this->ste_passers; 
        }
        // Save the model to the database
        $SSESProgram->save();
    }

    public function render()
    {
        $schools = School::all();
        return view('livewire.s-s-e-s-program',[ 
            'schools' => $schools,
        ]);
    }
}