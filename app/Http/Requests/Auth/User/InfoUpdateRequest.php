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
            'naam' => 'required|min:2|max:70|string',
            'achternaam' => 'required|min:2|max:70|string',
            'land' => 'required|min:4|max:60|string',
            'woonplaats' => 'required|min:3|max:80|string',
            'postcode' => 'required|min:4|max:8|string|regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i',
            'straat' => 'required|min:5|max:120|string',
            'huisnummer' => 'required|min:1|max:8|string',
            'telefoonnummer_vast' => ['required', 'regex:#^(((0)[1-9]{2}[0-9][-]?[1-9][0-9]{5})|((\+31|0|0031)[1-9][0-9][-]?[1-9][0-9]{6}))$#'],
            'telefoonnummer_mobiel' => ['required', 'regex:#^(((\+31|0|0031)6){1}[1-9]{1}[0-9]{7})$#i'],
        ];
    }

    public function messages()
    {
        return [
            'postcode.regex' => 'postcode formaat is ongeldig. Voorbeeld (5615AB)',
            'telefoonnummer_mobiel.regex' => 'telefoon nummer formaat is ongeldig. Voorbeeld 0612345678 of +31612345678',
            'telefoonnummer_vast.regex' => 'telefoon nummer formaat is ongeldig. Voorbeeld 0612345678 of +31612345678',
        ];
    }
}
