<?php

namespace App\Http\Livewire\Reports\ShsProgram;

use App\Models\NCPasserName;
use App\Models\School;
use App\Models\TVLProgramModel;
use Livewire\Component;

class TVLEditReport extends Component
{
    public $TVLTrack;
    public $TVLTrackID;
    public $school_year_start;
    public $school_year_end;
    public $specialization;
    public $grade_lvl;
    public $total_male_enrolled;
    public $total_female_enrolled;
    public $overall_enrolled;
    public $total_graduates;
    public $total_student_pursuing_college;
    public $total_student_seeking_job;
    public $total_student_doing_business;
    public $undecided_student_total;
    public $total_NC_passer;
    public $passerNames = [];
    public $selectedSchool;
    public $school;

    protected $listeners = ['editTVLSelect2', 'updateRecord'];

    public function editTVLSelect2($value)
    {
        $this->selectedSchool = $value;
    }

    public function confirmUpdate(){
        $this->emit('confirmUpdate');
    }
    
    public function mount($id)
    {
        $this->TVLTrack = TVLProgramModel::findOrFail($id);
        $this->TVLTrackID = $id;
        $this->school_year_start = $this->TVLTrack->school_year_start;
        $this->school_year_end = $this->TVLTrack->school_year_end;
        $this->specialization = $this->TVLTrack->specialization;
        $this->grade_lvl = $this->TVLTrack->grade_lvl;
        $this->total_male_enrolled = $this->TVLTrack->total_male_enrolled;
        $this->total_female_enrolled = $this->TVLTrack->total_female_enrolled;
        $this->overall_enrolled = $this->TVLTrack->overall_enrolled;
        $this->total_graduates = $this->TVLTrack->total_graduates;
        $this->total_student_pursuing_college = $this->TVLTrack->total_student_pursuing_college;
        $this->total_student_seeking_job = $this->TVLTrack->total_student_seeking_job;
        $this->total_student_doing_business = $this->TVLTrack->total_student_doing_business;
        $this->undecided_student_total = $this->TVLTrack->undecided_student_total;
        $this->total_NC_passer = $this->TVLTrack->total_NC_passer;
        $this->school=School::findOrFail($this->TVLTrack->school_id);
        $this->selectedSchool = $this->school->id;
        $this->passerNames = NCPasserName::where('tvlTrack_id', $this->TVLTrack->id)->get()->toArray();  
    }

    public function updatedTotalNCPasser()
    {
        $currentCount = count($this->passerNames);
        $newCount = intval($this->total_NC_passer);

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
                    NCPasserName::where('id', $record['id'])->delete();
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

        try{
            // Find the ALS record to update
            $TVLDB = TVLProgramModel::findOrFail($this->TVLTrackID);

            // Check if any changes have been made
            $changesMade = 
                $TVLDB->school_id != $this->selectedSchool ||
                $TVLDB->school_year_start != $this->school_year_start ||
                $TVLDB->school_year_end != $this->school_year_end ||
                $TVLDB->specialization != $this->specialization ||
                $TVLDB->grade_lvl != $this->grade_lvl ||
                $TVLDB->total_male_enrolled != $this->total_male_enrolled ||
                $TVLDB->total_female_enrolled != $this->total_female_enrolled ||
                $TVLDB->overall_enrolled != $this->overall_enrolled ||
                $TVLDB->total_graduates != $this->total_graduates ||
                $TVLDB->total_student_pursuing_college != $this->total_student_pursuing_college ||
                $TVLDB->total_student_seeking_job != $this->total_student_seeking_job ||
                $TVLDB->total_student_doing_business != $this->total_student_doing_business ||
                $TVLDB->total_NC_passer != $this->total_NC_passer;

            // If no changes have been made, proceed with updating the record without further checks
            if (!$changesMade) {
                // Update the ALS record to mark as "updated" even if there are no actual changes
                $TVLDB->touch(); // Update the timestamp to mark as updated
                $TVLDB->save();
                
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
            $existingRecord = TVLProgramModel::where('id', '!=', $this->TVLTrackID)
                ->where('school_id', $this->selectedSchool)
                ->where('specialization', $this->specialization)
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
        
            $this->TVLTrack->update([

                'school_id' => $this->selectedSchool,
                'school_year_start' => $this->school_year_start,
                'school_year_end' => $this->school_year_end,
                'specialization' => $this->specialization,
                'grade_lvl' => $this->grade_lvl,
                'total_male_enrolled' => $this->total_male_enrolled,
                'total_female_enrolled' => $this->total_female_enrolled,
                'overall_enrolled' => $this->overall_enrolled,
                'total_graduates' => $this->total_graduates,
                'total_student_pursuing_college' => $this->total_student_pursuing_college,
                'total_student_seeking_job' => $this->total_student_seeking_job,
                'total_student_doing_business' => $this->total_student_doing_business,
                'undecided_student_total' => $this->undecided_student_total,
                'total_NC_passer' => $this->total_NC_passer ,
            ]);
        
            // Update or create DostPasserName records
            foreach ($this->passerNames as $passerData) {
                if (isset($passerData['id'])) {
                    // If ID is set, update the existing record
                    $passerRecord = NCPasserName::find($passerData['id']);
                    if ($passerRecord) {
                        $passerRecord->update(['full_name' => $passerData['full_name']]);
                    }
                } else {
                    // If ID is not set, create a new record
                    NCPasserName::create(['tvlTrack_id' => $this->TVLTrack->id, 'full_name' => $passerData['full_name']]);
                }
            }
            $this->emit('showNotifications', [
                    'type' => 'success',
                    'message' => 'Record updated',
                ]);
        }catch (\Exception $e){
            // Catch any exceptions
            $this->emit('showNotifications', [
                'type' => 'error',
                'message' => 'Internal Server Error',
            ]);
        }
    }

    public function updated(){
        if($this->total_male_enrolled === ''){
            $this->total_male_enrolled = 0;
        }elseif($this->total_female_enrolled === ''){
            $this->total_female_enrolled = 0;
        }
        $this->overall_enrolled = $this->total_male_enrolled + $this->total_female_enrolled;
    }

    public function render()
    {
        $schools = School::all();
        return view('livewire.reports.shs-program.t-v-l-edit-report',[
            'schools' => $schools,
            'TVLTrack' => $this->TVLTrack,
        ]);
    }
}
