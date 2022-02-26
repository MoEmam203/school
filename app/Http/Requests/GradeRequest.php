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
        switch(request()->method){
            case 'POST':
                return [
                    'name_ar' => 'required|string|min:3|max:255|unique:grades,name->ar,'.$this->id,
                    'name_en' => 'required|string|min:3|max:255|unique:grades,name->en,'.$this->id,
                ];
                break;
            
            case 'PUT':
            case 'PATCH':
                return [
                    'name_ar' => 'required|string|min:3|max:255|unique:grades,name->ar,'.$this->grade->id,
                    'name_en' => 'required|string|min:3|max:255|unique:grades,name->en,'.$this->grade->id,
                ];
                break;
        }
    }
}
