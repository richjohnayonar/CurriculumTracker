<?php

namespace App\Http\Livewire\Reports\ShsProgram\AllReport;

use App\Models\AcademicTrack;
use App\Models\TVLProgramModel;
use Livewire\Component;

class AllShs extends Component
{
    
    public function navigateTo($link, $uniquestrand)
    {
        // Construct the URL with nested parameters
        $url = "/{$link}/" . urlencode($uniquestrand);
        // Navigate to the specified route
        return redirect()->to($url);
    }
      
    public function render()
    {
        $uniqueStrandAcademics = AcademicTrack::distinct()->pluck('strand');
        $uniqueTVLSpecializations = TVLProgramModel::distinct()->pluck('specialization');
        return view('livewire.reports.shs-program.all-report.all-shs', [
        'uniqueStrandAcademics' => $uniqueStrandAcademics,
        'uniqueTVLSpecializations' => $uniqueTVLSpecializations,
        ]);
    }
}
