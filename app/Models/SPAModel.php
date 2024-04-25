<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPAModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'user_id',
        'school_year_start',
        'school_year_end',
        'no_enrolled_male_stud',
        'no_enrolled_female_stud',
        'overall_enrolled',
        'grade_lvl',
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
