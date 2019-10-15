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
        $rules = [
            'title' => 'required|min:2|max:70',
            'description' => 'max:1000',
            'default_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'discount' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required',
            'meta_title' => 'max:70',
            'meta_description' => 'max:180',
        ];

        $moreOptionsCheckbox = $this->request->get('more_variants');

        if(isset($moreOptionsCheckbox))
        {
            if (isset($this->change_options)) {
                $rules['variant_options'] = 'required';
                if (isset($this->variant_options)){
                    foreach ($this->variant_options as $key => $val){
                        $rules['variant_options.'.$key] = 'required';
                    }
                }
            }else if (isset($this->variants)){
                foreach($this->variants as $key => $val) {
                    $rules['variants.'.$key.'.stock'] = 'required|numeric';
                    $rules['variants.'.$key.'.price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
                    $rules['variants.'.$key.'.ean'] = 'required|min:4';
                }
            }else{
                $rules['variant_options'] = 'required';
            }
        }else{
            $rules['variant.stock'] = 'required|numeric';
            $rules['variant.ean'] = 'required|min:4';
        }

        return  $rules;
    }

    public function messages()
    {
        return [
            'variant_options.*.required' => 'Dit veld is verplicht!',
            'variants.*.required' => 'Dit veld is verplicht!',
            'regex' => 'Dit veld moet een prijs zijn bv. 5.00, 50 of 23.05',
        ];
    }
}
