<?php

namespace App\Http\Livewire;

use App\Models\als;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AlsProgram extends Component
{
    public $school_lvl = 'Basic Literacy';
    public $scYearStart;
    public $scYearEnd;
    public $overallEnrolled = 0;
    public $enrolledMale =  0;
    public $enrolledFemale = 0;
    
    public function updated(){
        $this->overallEnrolled = $this->enrolledMale + $this->enrolledFemale;
    }

     public function savePost(){
        $userId = Auth::id();

           // Extract year from the input date
        $inputYear = date('Y', strtotime($this->scYearStart));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecord = als::where('user_id', $userId)
            ->where('school_lvl', $this->school_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            dd('Record already exists.');
        }
        
        $alsProgramDB = new als();
        $alsProgramDB->school_lvl = $this->school_lvl;
        $alsProgramDB->user_id = $userId;
        $alsProgramDB->school_year_start = $this->scYearStart;
        $alsProgramDB->school_year_end = $this->scYearEnd;
        $alsProgramDB->no_enrolled_male_stud = $this->enrolledMale;
        $alsProgramDB->no_enrolled_female_stud = $this->enrolledFemale;
        $alsProgramDB->overall_enrolled = $this->overallEnrolled;

        $alsProgramDB->save();
    }

    public function render()
    {
        return view('livewire.als-program');
    }
}
