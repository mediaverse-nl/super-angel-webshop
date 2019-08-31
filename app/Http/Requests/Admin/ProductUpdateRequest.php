<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'category' => 'required|numeric',
            'img' => 'required|string',
            'title' => 'required|string|min:5|max:60',
            'description' => 'required|string|min:30|max:300',
            'location' => 'string|nullable',
            'region' => 'required|string',
            'price_per_hour' => 'required',
            'max_number_of_people' => 'required|numeric',
            'min_number_of_people' => 'required|numeric',
            'min_duration' => 'required|numeric',
        ];
    }
}
