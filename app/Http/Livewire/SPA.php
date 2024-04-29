<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\SPAModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SPA extends Component
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
            $existingRecord = SPAModel::where('user_id', $userId)
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

            $SPA = new SPAModel();
            $SPA->school_id = $this->selectedSchool;
            $SPA->user_id = $userId;
            $SPA->grade_lvl = $this->grade_lvl;
            $SPA->school_year_start = $this->scYearStart;
            $SPA->school_year_end = $this->scYearEnd;
            $SPA->no_enrolled_male_stud = $this->enrolledMale;
            $SPA->no_enrolled_female_stud = $this->enrolledFemale;
            $SPA->overall_enrolled = $this->overallEnrolled;

            $SPA->save();

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
        return view('livewire.s-p-a',[ 
            'schools' => $schools,
        ]);
    }
}
