<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = [
        'matric_number',
        'course',
        'course_code',
        'lecturer_name',
        'room_no',
        'details',
    ];
}
