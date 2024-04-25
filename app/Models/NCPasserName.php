<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NCPasserName extends Model
{
    use HasFactory;

    protected $fillable = [
        'tvlTrack_id',
        'full_name',
     ];

     public function tvlProgramTrack()
    {
        return $this->belongsTo(TVLProgramModel::class);
    }
}
