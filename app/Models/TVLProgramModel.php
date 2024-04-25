<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVLProgramModel extends Model
{
    use HasFactory;

     protected $fillable = [
        'school_id',
        'user_id',
        'school_year_start',
        'school_year_end',
        'grade_lvl',
        'specialization',
        'total_male_enrolled',
        'total_female_enrolled',
        'overall_enrolled',
        'total_male_enrolled',
        'total_graduates',
        'total_student_pursuing_college',
        'total_student_seeking_job',
        'total_student_doing_business',
        'undecided_student_total',
        'total_NC_passer',
    ];

    public function ncPasserName()
    {
        return $this->hasMany(NCPasserName::class);
    }

     public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

       public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
