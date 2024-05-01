<?php

namespace App\Http\Livewire\Reports\ShsProgram\AllReport;

use App\Models\AcademicTrack;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class SpecificStrandReport extends Component
{
    use WithPagination;
    public $uniqueStrand;
    public $originalStrand;
   
    public function mount($uniqueStrand)
    {
        // Decode the URL-encoded unique strand parameter
        $this->uniqueStrand = urldecode($uniqueStrand);


        //  // Retrieve the original specialization value from the session
        // $this->originalStrand = Session::get('originalStrand');
    }

    
      public function navigateTo($route)
    {
        // Navigate to the specified route
        return redirect()->to($route);
    } 
    
    public function render()
    {
        $academicTracks = AcademicTrack::with('school')
            ->where('strand', $this->uniqueStrand)
            ->paginate(5);
        return view('livewire.reports.shs-program.all-report.specific-strand-report', [
        'academicTracks' => $academicTracks,
        ]);
    }
}
