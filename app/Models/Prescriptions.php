<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescriptions extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicine_id',
        'doctor_id',
        'patient_id',
        'symptoms',
        'diagnosis',
        'advice',
        'date',
        'pre_instruction',
        'pre_code'
    ];

}
