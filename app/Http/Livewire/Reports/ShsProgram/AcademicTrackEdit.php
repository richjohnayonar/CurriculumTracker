<?php

namespace App\Http\Livewire\Reports\ShsProgram;

use App\Models\AcademicTrack;
use App\Models\DostPasserName;
use App\Models\School;
use Livewire\Component;

class AcademicTrackEdit extends Component
{
    public $academicTrack;
    public $academicTrackId;
    public $school_year_start;
    public $school_year_end;
    public $strand;
    public $grade_lvl;
    public $total_male_enrolled;
    public $total_female_enrolled;
    public $overall_enrolled;
    public $total_graduates;
    public $total_student_pursuing_college;
    public $total_student_seeking_job;
    public $total_student_doing_business;
    public $undecided_student_total;
    public $total_dost_passer;
    public $passerNames = [];
    public $selectedSchool;
    public $school;

    protected $listeners = ['EditAcademicSelect2', 'updateRecord'];

    public function EditAcademicSelect2($value)
    {
        $this->selectedSchool = $value;
    }
    public function confirmUpdate(){
        $this->emit('confirmUpdate');
    }

    public function mount($id)
    {
        $this->academicTrack = AcademicTrack::findOrFail($id);
        $this->academicTrackId = $id;
        $this->school_year_start = $this->academicTrack->school_year_start;
        $this->school_year_end = $this->academicTrack->school_year_end;
        $this->strand = $this->academicTrack->strand;
        $this->grade_lvl = $this->academicTrack->grade_lvl;
        $this->total_male_enrolled = $this->academicTrack->total_male_enrolled;
        $this->total_female_enrolled = $this->academicTrack->total_female_enrolled;
        $this->overall_enrolled = $this->academicTrack->overall_enrolled;
        $this->total_graduates = $this->academicTrack->total_graduates;
        $this->total_student_pursuing_college = $this->academicTrack->total_student_pursuing_college;
        $this->total_student_seeking_job = $this->academicTrack->total_student_seeking_job;
        $this->total_student_doing_business = $this->academicTrack->total_student_doing_business;
        $this->undecided_student_total = $this->academicTrack->undecided_student_total;
        $this->total_dost_passer = $this->academicTrack->total_dost_passer;
        $this->school=School::findOrFail($this->academicTrack->school_id);
        $this->selectedSchool = $this->school->id;
        $this->passerNames = DostPasserName::where('academicTrack_id', $this->academicTrack->id)->get()->toArray();   
    }

    public function updatedTotalDostPasser()
    {
        $currentCount = count($this->passerNames);
        $newCount = intval($this->total_dost_passer);

        if ($newCount > $currentCount) {
            // Add new elements to the passerNames array
            for ($i = $currentCount; $i < $newCount; $i++) {
                $this->passerNames[] = ['id' => null, 'full_name' => '']; // Add 'id' property
            }
        } elseif ($newCount < $currentCount) {
            // Determine the excess records to be deleted
            $excessRecords = array_slice($this->passerNames, $newCount);
            
            // Remove elements from the passerNames array
            $this->passerNames = array_slice($this->passerNames, 0, $newCount);
            
            // Assuming your model is named DostPasser, you would perform the deletion like this:
            foreach ($excessRecords as $record) {
                if ($record['id'] !== null) { // Check if 'id' is not null
                    DostPasserName::where('id', $record['id'])->delete();
                }
            }
        }
    }

     public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 
    
    public function updateRecord(){

        // Find the ALS record to update
        $AcademicDb = AcademicTrack::findOrFail($this->academicTrackId);

        // Check if any changes have been made
        $changesMade = 
            $AcademicDb->school_id != $this->selectedSchool ||
            $AcademicDb->school_year_start != $this->school_year_start ||
            $AcademicDb->school_year_end != $this->school_year_end ||
            $AcademicDb->strand != $this->strand ||
            $AcademicDb->grade_lvl != $this->grade_lvl ||
            $AcademicDb->total_male_enrolled != $this->total_male_enrolled ||
            $AcademicDb->total_female_enrolled != $this->total_female_enrolled ||
            $AcademicDb->overall_enrolled != $this->overall_enrolled ||
            $AcademicDb->total_graduates != $this->total_graduates ||
            $AcademicDb->total_student_pursuing_college != $this->total_student_pursuing_college ||
            $AcademicDb->total_student_seeking_job != $this->total_student_seeking_job ||
            $AcademicDb->total_student_doing_business != $this->total_student_doing_business ||
            $AcademicDb->total_dost_passer != $this->total_dost_passer;

        // If no changes have been made, proceed with updating the record without further checks
        if (!$changesMade) {
            // Update the ALS record to mark as "updated" even if there are no actual changes
            $AcademicDb->touch(); // Update the timestamp to mark as updated
            $AcademicDb->save();
            
            // Optionally, you can provide feedback to the user that the record has been "updated"
            // For example:
            $this->emit('showNotifications', [
                'type' => 'success',
                'message' => 'Record updated',
            ]);
            return;
        }
        
        // Extract year from the input date
        $inputYear = date('Y', strtotime($this->school_year_start));

        // Check if there's an existing record with the same user_id, school_id, and school_year_start
        $existingRecord = AcademicTrack::where('id', '!=', $this->academicTrackId)
            ->where('school_id', $this->selectedSchool)
            ->where('strand', $this->strand)
            ->where('grade_lvl', $this->grade_lvl)
            ->whereYear('school_year_start', $inputYear)
            ->first();

        // If an existing record is found, prevent updating with the same data
        if ($existingRecord) {
            // You can add any specific action here, such as showing an error message
            // or redirecting back with a message indicating the duplicate record.
            // For now, let's just halt further processing.
              $this->emit('showNotifications', [
                'type' => 'error',
                'message' => 'Failed to update, record alreay exist on database',
            ]);

            return;
        }

         $this->academicTrack->update([
            'school_id' => $this->selectedSchool,
            'school_year_start' => $this->school_year_start,
            'school_year_end' => $this->school_year_end,
            'strand' => $this->strand,
            'grade_lvl' => $this->grade_lvl,
            'total_male_enrolled' => $this->total_male_enrolled,
            'total_female_enrolled' => $this->total_female_enrolled,
            'overall_enrolled' => $this->overall_enrolled,
            'total_graduates' => $this->total_graduates,
            'total_student_pursuing_college' => $this->total_student_pursuing_college,
            'total_student_seeking_job' => $this->total_student_seeking_job,
            'total_student_doing_business' => $this->total_student_doing_business,
            'undecided_student_total' => $this->undecided_student_total,
            'total_dost_passer' => $this->total_dost_passer,
        ]);
        
       // Update or create DostPasserName records
        foreach ($this->passerNames as $passerData) {
            if (isset($passerData['id'])) {
                // If ID is set, update the existing record
                $passerRecord = DostPasserName::find($passerData['id']);
                if ($passerRecord) {
                    $passerRecord->update(['full_name' => $passerData['full_name']]);
                }
            } else {
                // If ID is not set, create a new record
                DostPasserName::create(['academicTrack_id' => $this->academicTrack->id, 'full_name' => $passerData['full_name']]);
            }
        }

         $this->emit('showNotifications', [
                'type' => 'success',
                'message' => 'Record updated.',
            ]);
    }

     public function updated(){
        $this->overall_enrolled = $this->total_male_enrolled + $this->total_female_enrolled;
    }

    public function render()
    {

        $schools = School::all();
        return view('livewire.reports.shs-program.academic-track-edit', [
            'schools' => $schools,
            'academicTrackEdit' => $this->academicTrack,
        ]);
    }
}
