<?php

use App\Http\Livewire\Admin\CreateSchool;
use App\Http\Livewire\Admin\UserInfo;
use App\Http\Livewire\AlsProgram;
use App\Http\Livewire\ArabicLanguageAndIslamicValuesEduc;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Reports\AlsProgram\AlsProgramReport;
use App\Http\Livewire\Reports\ArabLanguage\ArabLanguageReport;
use App\Http\Livewire\Reports\ShsProgram\AcademicTrackEdit;
use App\Http\Livewire\Reports\ShsProgram\AcademicTrackViewReport;
use App\Http\Livewire\Reports\ShsProgram\ShsProgramReport;
use App\Http\Livewire\Reports\ShsProgram\TVLEditReport;
use App\Http\Livewire\Reports\ShsProgram\TVLViewReport;
use App\Http\Livewire\Reports\SpecialCurProgram\SPA\SPAEditReport;
use App\Http\Livewire\Reports\SpecialCurProgram\SPA\SPAViewReport;
use App\Http\Livewire\Reports\SpecialCurProgram\SPECIALSSESProgram;
use App\Http\Livewire\Reports\SpecialCurProgram\SPED\SPEDEditProgramReport;
use App\Http\Livewire\Reports\SpecialCurProgram\SPED\SPEDViewProgramReport;
use App\Http\Livewire\Reports\SpecialCurProgram\SPJ\SPJEditProgramReport;
use App\Http\Livewire\Reports\SpecialCurProgram\SPJ\SPJViewProgramReport;
use App\Http\Livewire\Reports\SpecialCurProgram\SSES\SSESEditReport;
use App\Http\Livewire\Reports\SpecialCurProgram\SSES\SSESViewReport;
use App\Http\Livewire\Reports\SpecialCurProgram\STE\STEEditProgramReport;
use App\Http\Livewire\Reports\SpecialCurProgram\STE\STEViewProgramReport;
use App\Http\Livewire\School;
use App\Http\Livewire\SHSProgram;
use App\Http\Livewire\SpecialCurricularProgram;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::get('/register', Register::class)->middleware('guest');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Routes accessible only to users with the 'admin' role
    Route::get('/admin/create-school', CreateSchool::class);
    Route::get('/admin/user-info', UserInfo::class);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Routes accessible only to users with the 'admin' role
    // Route::get('/special-curricular-program', SpecialCurricularProgram::class);
    // Route::get('/arabic-language', ArabicLanguageAndIslamicValuesEduc::class);
    // Route::get('/als-program', AlsProgram::class);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', School::class)->name('dashboard');
    Route::get('/special-curricular-program', SpecialCurricularProgram::class);
    Route::get('/arabic-language', ArabicLanguageAndIslamicValuesEduc::class);
    Route::get('/als-program', AlsProgram::class);
    Route::get('/shs-program', SHSProgram::class);
    Route::get('/shs-program-report', ShsProgramReport::class);
    Route::get('/shs-program-report/acad-view/{id}', AcademicTrackViewReport::class);
    Route::get('/shs-program-report/acad-edit/{id}', AcademicTrackEdit::class);
    Route::get('/shs-program-report/tvl-view/{id}', TVLViewReport::class);
    Route::get('/shs-program-report/tvl-edit/{id}', TVLEditReport::class);

    Route::get('/special-C-program', SPECIALSSESProgram::class);
    Route::get('/special-C-program/sses-view/{id}', SSESViewReport::class);
    Route::get('/special-C-program/sses-edit/{id}', SSESEditReport::class);

    Route::get('/special-C-program/ste-view/{id}', STEViewProgramReport::class);
    Route::get('/special-C-program/ste-edit/{id}', STEEditProgramReport::class);

    Route::get('/special-C-program/sped-view/{id}', SPEDViewProgramReport::class);
    Route::get('/special-C-program/sped-edit/{id}', SPEDEditProgramReport::class);

    Route::get('/special-C-program/spj-view/{id}', SPJViewProgramReport::class);
    Route::get('/special-C-program/spj-edit/{id}', SPJEditProgramReport::class);

    Route::get('/special-C-program/spa-view/{id}', SPAViewReport::class);
    Route::get('/special-C-program/spa-edit/{id}', SPAEditReport::class);

    Route::get('/arab-Islam-language-edu', ArabLanguageReport::class);
    Route::get('/als-program-report', AlsProgramReport::class);
});