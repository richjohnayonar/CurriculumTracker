<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'user_id',
        'school_year_start',
        'school_year_end',
        'grade_lvl',
        'no_enrolled_male_stud',
        'no_enrolled_female_stud',
        'overall_enrolled',
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
