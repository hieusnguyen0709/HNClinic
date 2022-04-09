<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time_Frame extends Model
{
    use HasFactory;
    protected $fillable = [
        'frame_name',
        'start_time',
        'end_time',
    ];
}
