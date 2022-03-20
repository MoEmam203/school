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
        return [
            'email' => 'required|email|unique:teachers,email,except,'.$this->id,
            'password' => 'required|min:8|max:255',
            'name_ar' => 'required|string|min:3|max:255',
            'name_en' => 'required|string|min:3|max:255',
            'joining_date' => 'required|date',
            'address' => 'required|min:3',
            'specialization_id' => 'required|exists:specializations,id',
            'gender_id' => 'required|exists:genders,id'
        ];
    }
}
