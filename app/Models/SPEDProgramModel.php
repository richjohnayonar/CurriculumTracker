<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPEDProgramModel extends Model
{
    use HasFactory;

     protected $fillable = [
        'school_id',
        'user_id',
        'school_year_start',
        'school_year_end',
        'type_of_learners',
        'grade_lvl',
        'no_enrolled_male_stud',
        'no_enrolled_female_stud',
        'overall_enrolled',
        'pisay_passers',
        'ste_passers',
     ];

     public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

      public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
