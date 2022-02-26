<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'List_Classes.*.name_ar' => 'required|min:5|max:255|string',
            'List_Classes.*.name_en' => 'required|min:5|max:255|string',
            'List_Classes.*.grade_id' => 'required|exists:grades,id'
        ];
    }
}
