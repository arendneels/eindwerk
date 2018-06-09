<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
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
        $input = $this->all();
        $user = Auth::user();
        $validationArray = [];

        // For not logged in users, require form data
        if(!$user){
            $validationArray = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'country_id' => 'required',
                'postal_code' => 'required',
                'city' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ];
        }

        // For not logged in users who wish to create an account, require password and unique email
        if(!$user && isset($input['checkbox_create'])){
            $validationArray['password'] = 'required|min:6';
            $validationArray['email'] = 'required|unique:users';
        }

        // For logged in users who chose a diffrent shipping address
        if($user && isset($input['checkbox_shipping'])){
            $validationArray = [
                'first_name' => 'required',
                'last_name' => 'required',
                'country_id' => 'required',
                'postal_code' => 'required',
                'city' => 'required',
                'address' => 'required',
            ];
        };

        // Always require users to check agree checkbox
        $validationArray['agree'] = 'required';

        //Always require payment
        $validationArray['stripeToken'] = 'required';

        return $validationArray;
    }
}
