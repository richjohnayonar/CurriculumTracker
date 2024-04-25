<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'name',
    ];
        public function academicTrack()
    {
        return $this->hasMany(AcademicTrack::class, 'school_id', 'id');
    }
        public function tvlTrack()
    {
        return $this->hasMany(TVLProgramModel::class, 'school_id', 'id');
    }
        public function SSESProgram()
    {
        return $this->hasMany(SSESProgramModel::class, 'school_id', 'id');
    } 
        public function STEProgram()
    {
        return $this->hasMany(STEProgramModel::class, 'school_id', 'id');
    } 
        public function SPEDProgram()
    {
        return $this->hasMany(SPEDProgramModel::class, 'school_id', 'id');
    } 
        public function SPJProgramModel()
    {
        return $this->hasMany(SPJProgramModel::class, 'school_id', 'id');
    } 
        public function SPAModel()
    {
        return $this->hasMany(SPAModel::class, 'school_id', 'id');
    }
        public function ArabicLang()
    {
        return $this->hasMany(ArabicLanguage::class, 'school_id', 'id');
    }
}
