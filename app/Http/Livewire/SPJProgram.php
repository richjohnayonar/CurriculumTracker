<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\SPJProgramModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SPJProgram extends Component
{
    public $grade_lvl = 'Grade 4';
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
        if($this->enrolledMale === ''){
            $this->enrolledMale = 0;
        }elseif($this->enrolledFemale === ''){
            $this->enrolledFemale = 0;
        }
        $this->overallEnrolled = $this->enrolledMale + $this->enrolledFemale;
    }
    
     public function savePost(){
        try{
            $userId = Auth::id();

            // Extract year from the input date
            $inputYear = date('Y', strtotime($this->scYearStart));

            // Check if there's an existing record with the same user_id, school_id, and school_year_start
            $existingRecord = SPJProgramModel::where('user_id', $userId)
                ->where('school_id', $this->selectedSchool)
                ->where('grade_lvl', $this->grade_lvl)
                ->whereYear('school_year_start', $inputYear)
                ->first();

            if($existingRecord){
                // If a record exists, prevent saving the duplicate record
                $this->emit('showNotifications', [
                    'type' => 'error',
                    'message' => 'This record already in the database.',
                ]);

                return;
            }

            $SPJProgram = new SPJProgramModel();
            $SPJProgram->school_id = $this->selectedSchool;
            $SPJProgram->user_id = $userId;
            $SPJProgram->grade_lvl = $this->grade_lvl;
            $SPJProgram->school_year_start = $this->scYearStart;
            $SPJProgram->school_year_end = $this->scYearEnd;
            $SPJProgram->no_enrolled_male_stud = $this->enrolledMale;
            $SPJProgram->no_enrolled_female_stud = $this->enrolledFemale;
            $SPJProgram->overall_enrolled = $this->overallEnrolled;

            $SPJProgram->save();

            $this->emit('showNotifications', [
            'type' => 'success',
            'message' => 'Record Save.',
            ]);
            $this->reset();
        }catch (\Exception $e){
            // Catch any exceptions
            $this->emit('showNotifications', [
                'type' => 'error',
                'message' => 'Internal Server Error',
            ]);
        }
    }

    public function render()
    {
        $schools = School::all();
        return view('livewire.s-p-j-program',[ 
            'schools' => $schools,
        ]);
    }
}
