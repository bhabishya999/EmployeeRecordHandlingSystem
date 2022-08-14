<?php

namespace App\Models;
use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country_code',
        'contact_number',
        'date_of_birth',
        'current_address',
        'pan_number',
        'bank_account_number',
        'avatar',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
