<?php

namespace App\Http\Requests\Site;

use App\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class OrderStoreRequest extends FormRequest
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
            'email' => 'required|email',
            'naam' => 'required|max:60',
            'straat' => 'required|min:5|max:120|string',
            'huisnummer' => 'required|min:1|max:8|string',
            'postcode' => 'required|min:4|max:8|string|regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i',
            'woonplaats' => 'required|min:1',
            'land' => 'required|in:nederland,belgie',
            'telefoonnummer_vast' => ['nullable','regex:#^(((0)[1-9]{2}[0-9][-]?[1-9][0-9]{5})|((\+31|0|0031)[1-9][0-9][-]?[1-9][0-9]{6}))$#'],
            'telefoonnummer_mobiel' => ['required', 'regex:#^(((\+31|0|0031)6){1}[1-9]{1}[0-9]{7})$#i'],
            'aflevernotitie' => 'max:150',
            'opmerking' => 'max:500',
            'algemene_voorwaarden' => 'accepted',

        ];
    }
}
