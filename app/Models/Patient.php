<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable = [
        'name',
        'father_name',
        'dob',
        'gender',
        'phone',
        'age',
        'nrc',
        'is_active',
        'nationality',
        'current_address',
        'contact_person_name',
        'contact_person_phone',
        'created_by',
        'modified_by',
    ];
}
