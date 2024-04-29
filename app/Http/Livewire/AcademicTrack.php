<?php

namespace App\Http\Livewire;

use App\Models\AcademicTrack as ModelsAcademicTrack;
use App\Models\DostPasserName;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AcademicTrack extends Component
{
    public $overallEnrolled = 0;
    public $enrolledMale =  0;
    public $enrolledFemale = 0;
    public $dostPassers = null;
    public $passerNames = [];
    public $scYearStart;
    public $scYearEnd;
    public $strand = 'General Academic Strand (GAS)';
    public $grade_lvl = 'Grade 11';
    public $num_Grad;
    public $num_College_take;
    public $num_job_take;
    public $num_business_take;
    public $num_undecided;
    public $selectedSchool;

    protected $listeners = ['EditAcademicSelect2'];

    public function EditAcademicSelect2($value)
    {
        $this->selectedSchool = $value;
    }

    public function updatedDOSTpassers()
    {
        $currentCount = count($this->passerNames);
        $newCount = intval($this->dostPassers);

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

    try {
    // Get the authenticated user's ID
    $userId = Auth::id();

    // Extract year from the input date
    $inputYear = date('Y', strtotime($this->scYearStart));

    // Check if there's an existing record with the same user_id, school_id, and school_year_start
    $existingRecord = ModelsAcademicTrack::where('user_id', $userId)
        ->where('school_id', $this->selectedSchool)
        ->where('strand', $this->strand)
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

    // If no existing record found or conditions for duplicate entry not met, proceed to create new record
    $academicTrack = new ModelsAcademicTrack();

    $academicTrack->school_id = $this->selectedSchool;
    $academicTrack->user_id = $userId; // Assign the user ID
    $academicTrack->school_year_start = $this->scYearStart;
    $academicTrack->school_year_end = $this->scYearEnd;
    $academicTrack->strand = $this->strand;
    $academicTrack->grade_lvl = $this->grade_lvl;
    $academicTrack->total_male_enrolled = $this->enrolledMale;
    $academicTrack->total_female_enrolled = $this->enrolledFemale;
    $academicTrack->overall_enrolled = $this->overallEnrolled;
    $academicTrack->total_graduates = $this->num_Grad;
    $academicTrack->total_student_pursuing_college = $this->num_College_take;
    $academicTrack->total_student_seeking_job = $this->num_job_take;
    $academicTrack->total_student_doing_business = $this->num_business_take;
    $academicTrack->undecided_student_total = $this->num_undecided;
    $academicTrack->total_dost_passer = $this->dostPassers;

    // Save the model to the database
    $academicTrack->save();

    foreach ($this->passerNames as $passerName) {
        // Create a new instance of DostPasser model
        $dostPasser = new DostPasserName();

        // Fill the model attributes using the fillable array
        $dostPasser->fill([
            'academicTrack_id' => $academicTrack->id, 
            'full_name' => $passerName,
            // Add other attributes as needed
        ]);

        // Save the DOST passer to the database
        $dostPasser->save();
    }
    $this->emit('showNotifications', [
        'type' => 'success',
        'message' => 'Save Succesfully',
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


    public function updated(){
        if($this->enrolledMale === ''){
            $this->enrolledMale = 0;
        }elseif($this->enrolledFemale === ''){
            $this->enrolledFemale = 0;
        }
        $this->overallEnrolled = $this->enrolledMale + $this->enrolledFemale;
    }
    public function render()
    {
        $schools = School::all();
        return view('livewire.academic-track', [ 
            'schools' => $schools,
        ]);
    }
}
