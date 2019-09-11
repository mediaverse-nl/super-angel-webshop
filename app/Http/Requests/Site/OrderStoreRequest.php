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
            'straat' => 'required|max:150',
            'huisnummer' => 'required|min:1|max:12',
            'postcode' => 'required|min:1',
            'woonplaats' => 'required|min:1',
            'land' => 'required|in:nederland,belgie',
            'telefoonnummer_vast' => '',
            'telefoonnummer_mobiel' => 'required|max:60',
            'aflevernotitie' => 'max:150',
            'opmerking' => 'max:500',
            'algemene_voorwaarden' => 'accepted',
        ];

//        Session::flash('id', (int)$this->request->get('id'));
//        Session::flash('activityType', 'public');

//        $event = new Event();
//        $event = $event->findOrFail($this->request->get('id'));
//        return [
//            'tickets' => 'required|numeric|in:'.implode(',', array_combine($event->publicTicketSelection(), $event->publicTicketSelection())),
//            'voorwaarden' => 'accepted',
//            'id' => 'required|integer',
//        ];
    }
}
