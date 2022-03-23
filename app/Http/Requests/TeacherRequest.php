<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        switch(request()->method){
            case 'POST':
                return [
                    'email' => 'required|email|unique:teachers,email',
                    'password' => 'required|min:8|max:255',
                    'name_ar' => 'required|string|min:3|max:255',
                    'name_en' => 'required|string|min:3|max:255',
                    'joining_date' => 'required|date',
                    'address' => 'required|min:3',
                    'specialization_id' => 'required|exists:specializations,id',
                    'gender_id' => 'required|exists:genders,id'
                ];
                break;
            
            case 'PUT':
            case 'PATCH':
                return [
                    'email' => 'required|email|unique:teachers,email,'.$this->teacher->id,
                    'name_ar' => 'required|string|min:3|max:255',
                    'name_en' => 'required|string|min:3|max:255',
                    'joining_date' => 'required|date',
                    'address' => 'required|min:3',
                    'specialization_id' => 'required|exists:specializations,id',
                    'gender_id' => 'required|exists:genders,id'
                ];
                break;

        }
    }
}
