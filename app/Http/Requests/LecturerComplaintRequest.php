<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerComplaintRequest extends FormRequest
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
            'course'  => 'required',
            'course_code'   =>  'required',
            'lecturer_name'  =>  'required',
            'room_no' =>  'required',
            'details'     =>  'required',
        ];
    }
}
