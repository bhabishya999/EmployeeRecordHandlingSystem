<?php


namespace App\Talent\EducationalDetails\Models;

use App\Talent\Employee\Model\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalDetails extends Model
{
    use HasFactory;

    protected $table = 'educational_details';

    protected $fillable = [
        'employee_id',
        'education_level',
        'passed_year',
        'institution'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
