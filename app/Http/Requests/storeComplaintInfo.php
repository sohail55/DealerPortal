<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeComplaintInfo extends FormRequest
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
             'username' => 'required',
             'email' => 'required|email',
             'phone' => 'required',
             'category' => 'required',
             'sub_category' => 'required',
             'comments' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //'bill_to_address_city.required' => 'Please enter the mailing address',
        ];
    }

}
