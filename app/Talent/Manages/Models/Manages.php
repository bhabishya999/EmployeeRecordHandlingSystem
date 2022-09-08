<?php

namespace App\Talent\Manages\Models;

use App\Talent\Employee\Model\Employee;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Manages extends Model
{
    use HasFactory;
    protected $table = "manages";

    public $timestamps = false;

    protected $fillable =
        [
            'employee_id',
            'key_employment_details_id'
        ];

    public function employee()
    {
        $this->belongsTo(Employee::class);
    }
    public function keyEmploymentDetail()
    {
        $this->belongsTo(KeyEmploymentDetails::class);
    }
}
