<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'value' => 'required|unique:category,id,'.$this->id.',NULL,id,value,'.$this->value

//            'value' => 'required|min:1|max:30|unique:category,value,' . $this->
        ];
    }
}
