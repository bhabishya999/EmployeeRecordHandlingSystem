<?php

namespace App\Talent\Leaves\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
        'form_id',
        'email',
        'full_name',
        'leave_type',
        'leave_reason',
        'leave_start_date',
        'leave_end_date',
        'leave_approved',
        'documents'

    ];
}
