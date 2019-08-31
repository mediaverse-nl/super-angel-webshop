<?php

namespace App\Http\Requests\Auth\User;

use Illuminate\Foundation\Http\FormRequest;

class InfoUpdateRequest extends FormRequest
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
            'voornaam' => 'required|min:2|max:70|string',
            'achternaam' => 'required|min:2|max:70|string',
            'telefoon_nr' => 'regex:/^[0-9]{8}$/',
            'land' => 'required|min:4|max:40|string',
            'stad' => 'required|min:3|max:50|string',
            'postcode' => 'required|min:6|max:6|string',
            'straat' => 'required|min:5|max:120|string',
            'straat_nr' => 'required|min:1|max:5|string',
        ];
    }
}
