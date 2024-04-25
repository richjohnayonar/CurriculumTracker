<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DostPasserName extends Model
{
    use HasFactory;

     protected $fillable = [
        'academicTrack_id',
        'full_name',
     ];

     public function academicTrack()
    {
        return $this->belongsTo(AcademicTrack::class, 'academicTrack_id', 'id');
    }
}
