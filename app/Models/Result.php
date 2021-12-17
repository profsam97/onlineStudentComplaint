<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'matric_number',
        'course_title',
        'course_code',
        'lecturer_name',
        'exam_session_month',
        'exam_session_year',
        'missing_mark',
        'details',
    ];
}
