<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'name_en' => 'required|string|min:3|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.string' => __('validation.string'),
            'name.min' => __('validation.min'),
            'name.max' => __('validation.max'),
            'name_en.required' => __('validation.required'),
            'name_en.string' => __('validation.string'),
            'name_en.min' => __('validation.min'),
            'name_en.max' => __('validation.max'),
        ];
    }
}
