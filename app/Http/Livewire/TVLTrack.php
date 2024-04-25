<?php

namespace App\Http\Livewire;

use App\Models\NCPasserName;
use App\Models\School;
use App\Models\TVLProgramModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TVLTrack extends Component
{
    public $overallEnrolled = 0;
    public $enrolledMale =  0;
    public $enrolledFemale = 0;
    public $NCPassers = null;
    public $passerNames = [];
    public $scYearStart;
    public $scYearEnd;
    public $specialization = null;
    public $num_Grad;
    public $num_College_take;
    public $num_job_take;
    public $num_business_take;
    public $num_undecided;
    public $selectedSchool;

    protected $listeners = ['editTVLSelect2'];

    public function editTVLSelect2($value)
    {
        $this->selectedSchool = $value;
    }
    
    public function updatedGradeLvl(){
         if (empty($this->specialization)) {
            if ($this->grade_lvl === 'Grade 11') {
                $this->specialization = 'Cookery';
            } elseif ($this->grade_lvl === 'Grade 12') {
                $this->specialization = 'Food & Beverage Services (FBS)/Bread &Pastry Production (BPP)';
            }
        }else{
            $this->specialization = $this->specialization;
        }
    }

   public function updatedNCPassers()
    {
        $currentCount = count($this->passerNames);
        $newCount = intval($this->NCPassers);

        if ($newCount > $currentCount) {
            // Add new elements to the passerNames array
            for ($i = $currentCount; $i < $newCount; $i++) {
                $this->passerNames[] = '';
            }
        } elseif ($newCount < $currentCount) {
            // Remove elements from the passerNames array
            $this->passerNames = array_slice($this->passerNames, 0, $newCount);
        }
    }

    public function savePost(){
        $userId = Auth::id();

        // Extract year from the input date
        $inputYear = date('Y', strtotime($this->scYearStart));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecord = TVLProgramModel::where('user_id', $userId)
            ->where('school_id', $this->selectedSchool)
            ->where('specialization', $this->specialization)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        if($existingRecord){
            // If a record exists, prevent saving the duplicate record
            dd('Record already exists.');
        }
    
        $TVLTRACK = new TVLProgramModel();
        $TVLTRACK->school_id = $this->selectedSchool;
        $TVLTRACK->user_id = $userId;
        $TVLTRACK->school_year_start = $this->scYearStart;
        $TVLTRACK->school_year_end = $this->scYearEnd; 
        $TVLTRACK->specialization = $this->specialization;
        $TVLTRACK->grade_lvl = $this->grade_lvl;
        $TVLTRACK->total_male_enrolled = $this->enrolledMale;
        $TVLTRACK->total_female_enrolled = $this->enrolledFemale;
        $TVLTRACK->overall_enrolled = $this->overallEnrolled;
        $TVLTRACK->total_graduates = $this->num_Grad;
        $TVLTRACK->total_student_pursuing_college = $this->num_College_take;
        $TVLTRACK->total_student_seeking_job = $this->num_job_take;
        $TVLTRACK->total_student_doing_business = $this->num_business_take;
        $TVLTRACK->undecided_student_total = $this->num_undecided;
        $TVLTRACK->total_nc_passer = $this->NCPassers;
        // Save the model to the database
        $TVLTRACK->save();
        foreach ($this->passerNames as $passerName) {
            // Create a new instance of DostPasser model
            $ncPasser = new NCPasserName();

            // Fill the model attributes using the fillable array
            $ncPasser->fill([
                'tvlTrack_id' => $TVLTRACK->id, 
                'full_name' => $passerName,
                // Add other attributes as needed
            ]); 

            // Save the DOST passer to the database
            $ncPasser->save();
        }

    }

    public function updated(){
        $this->overallEnrolled = $this->enrolledMale + $this->enrolledFemale;
    }
    public $grade_lvl = 'Grade 11';
    public function render()
    {
        $schools = School::all();
        return view('livewire.t-v-l-track', [ 
            'schools' => $schools,
        ]);
    }
}
