<?php

namespace App\Http\Livewire\Reports\SpecialCurProgram\AllReport;

use App\Models\SPAModel;
use App\Models\SPEDProgramModel;
use App\Models\SPJProgramModel;
use App\Models\SSESProgramModel;
use App\Models\STEProgramModel;
use Livewire\Component;

class AllSpecialCur extends Component
{
     public function navigateTo($link, $uniquestrand)
    {
        // Construct the URL with nested parameters
        $url = "/{$link}/" . urlencode($uniquestrand);
        // Navigate to the specified route
        return redirect()->to($url);
    }

    private function getSortedGradeLevels($gradeLevels)
    {
        return $gradeLevels->sort(function ($a, $b) {
            // Extract the numeric part of the grade level
            $gradeA = intval(preg_replace('/[^0-9]/', '', $a));
            $gradeB = intval(preg_replace('/[^0-9]/', '', $b));

            // Compare the numeric parts
            if ($gradeA == $gradeB) {
                return 0;
            }
            return ($gradeA < $gradeB) ? -1 : 1;
        });
    }

    public function render()
    {
        $uniqueprogramSSes = $this->getSortedGradeLevels(SSESProgramModel::distinct()->pluck('grade_lvl'));
        $uniqueprogramSte = $this->getSortedGradeLevels(STEProgramModel::distinct()->pluck('grade_lvl'));
        $uniqueprogramSped = SPEDProgramModel::distinct()->pluck('type_of_learners');
        $uniqueprogramSpj = $this->getSortedGradeLevels(SPJProgramModel::distinct()->pluck('grade_lvl'));
        $uniqueprogramSpa = $this->getSortedGradeLevels(SPAModel::distinct()->pluck('grade_lvl'));

        return view('livewire.reports.special-cur-program.all-report.all-special-cur', [
        'uniqueSSESGradeLvls' => $uniqueprogramSSes,
        'uniqueSTEGradeLvls' => $uniqueprogramSte,
        'uniqueSPEDTypeLearners' => $uniqueprogramSped,
        'uniqueSPJGradeLvls' => $uniqueprogramSpj,
        'uniqueSPAGradeLvls' => $uniqueprogramSpa,
        ]);
    }
}
 