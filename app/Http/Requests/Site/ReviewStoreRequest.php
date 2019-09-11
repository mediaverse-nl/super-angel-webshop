<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required',
            'naam' => 'required|max:60',
            'text' => 'required|max:500',
            'beoordeling' => 'required|in:0.5,1,1.5,2,2.5,3,3.5,4,4.5,5',
        ];
    }
}
