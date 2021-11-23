<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePersonalInfo extends FormRequest
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
             //'bill_to_address_city' => 'required',
             'bill_to_email' => 'required|email',
             'bill_to_phone' => 'required',
             'bill_to_address_line1' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //'bill_to_address_city.required' => 'Please enter the mailing address',
            'start_date.before' => '',
        ];
    }

}
