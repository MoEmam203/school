<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        switch (request()->method) {
            case 'POST':
                return [
                    'email' => 'required|email|unique:students,email',
                    'password' => 'required|min:8|max:255',
                    'name_ar' => 'required|string|min:3|max:255',
                    'name_en' => 'required|string|min:3|max:255',
                    'date_of_birth' => 'required|date',
                    'academic_year' => 'required',
                    
                    'gender_id' => 'required|exists:genders,id',
                    'nationality_id' => 'required|exists:nationalities,id',
                    'blood_type_id' => 'required|exists:blood__types,id',
                    'grade_id' => 'required|exists:grades,id',
                    'classroom_id' => 'required|exists:classrooms,id',
                    'section_id' => 'required|exists:sections,id',
                    'parent_id' => 'required|exists:my_parents,id',
                ];
                break;
            
            case 'PUT':
            case 'PATCH':
                return [
                    'email' => 'required|email|unique:students,email,'.$this->student->id,
                    // 'password' => 'required|min:8|max:255',
                    'name_ar' => 'required|string|min:3|max:255',
                    'name_en' => 'required|string|min:3|max:255',
                    'date_of_birth' => 'required|string',
                    'academic_year' => 'required',

                    'gender_id' => 'required|exists:genders,id',
                    'nationality_id' => 'required|exists:nationalities,id',
                    'blood_type_id' => 'required|exists:blood__types,id',
                    'grade_id' => 'required|exists:grades,id',
                    'classroom_id' => 'required|exists:classrooms,id',
                    'section_id' => 'required|exists:sections,id',
                    'parent_id' => 'required|exists:my_parents,id',
                ];
                break;
        }
    }
}
