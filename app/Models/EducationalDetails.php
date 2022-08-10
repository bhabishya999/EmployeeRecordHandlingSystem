<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'education_level',
        'passed_year',
        'institution'
    ];
}
