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
