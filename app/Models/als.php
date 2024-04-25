<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class als extends Model
{
    use HasFactory;

       protected $fillable = [
        'school_lvl',
        'user_id',
        'school_year_start',
        'school_year_end',
        'no_enrolled_male_stud',
        'no_enrolled_female_stud',
        'overall_enrolled',
     ];

       public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
