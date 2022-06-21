<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
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
            'name_ar' => 'required|string|min:3|max:255',
            'name_en' => 'required|string|min:3|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string|min:10',
            'year' => 'required|numeric',
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id'
        ];
    }
}
