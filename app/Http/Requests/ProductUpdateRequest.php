<?php

namespace App\Http\Requests;

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
        $rules = [
            'title' => 'required|min:2|max:70',
            'description' => 'max:1000',
            'default_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'discount' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
//            'discount' => 'nullable|regex:/^\d+(\.\d{1,2})?$/|greater_than_default_price:initial_page',
            'category_id' => 'required',
            'meta_title' => 'max:70',
            'meta_description' => 'max:180',
        ];

        $variantOptions = $this->request->get('variant_options');
        $moreOptionsCheckbox = $this->request->get('more_variants');

        if(isset($moreOptionsCheckbox))
        {
            if (!isset($variantOptions))

                foreach($this->variants as $key => $val)
                {
                    $rules['variants.'.$key.'.stock'] = 'required|numeric';
                    $rules['variants.'.$key.'.price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
                    $rules['variants.'.$key.'.ean'] = 'required|min:4';
                }
        }else{
            $rules['variant.stock'] = 'required|numeric';
            $rules['variant.ean'] = 'required|min:4';
        }

        return  $rules;
    }
}
