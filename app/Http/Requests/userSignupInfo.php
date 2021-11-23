<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userSignupInfo extends FormRequest
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
        //$end_date = (isset($this->IsResultAnnounced) && $this->IsResultAnnounced == "true") ? 'required|after:StartDate' : 'after:StartDate';
        return [
            'Cnic' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{8,}$/',
            // 'password' => ['required', 
            //    'min:6', 
            //    'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/', 
            //    'confirmed']
            // 'TotalMarks' => 'required',
            // 'ObtainedMarks' => 'required|lte:TotalMarks',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'start_date.required' => '',
    //         'start_date.before' => '',
    //     ];
    // }

}
