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

        if(!$user){
            $validationArray = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:users',
                'country_id' => 'required',
                'postal_code' => 'required',
                'city' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ];
        }

        if(!$user && isset($input['checkbox_create'])){
            $validationArray['password'] = 'required|min:6';
        }

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

        return $validationArray;
    }
}
