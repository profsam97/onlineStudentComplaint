<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentComplaintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'matric_number' => 'required',
            'course_title'  => 'required',
            'course_code'   =>  'required',
            'lecturer_name'  =>  'required',
            'exam_session_month' =>  'required',
            'exam_session_year'  =>  'required',
            'missing_mark'       =>  'required',
            'details'     =>  'required',
        ];
    }
}
