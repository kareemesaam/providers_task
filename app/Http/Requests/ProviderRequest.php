<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255', 'string'],
            'email' => ['required', 'min:3', 'max:255', 'email','unique:users,user_name'],
            'password' => ['required', 'min:8', 'max:255', 'confirmed'],
            'user_name' => ['required', 'min:3', 'max:255', 'unique:users,user_name'],
        ];
    }
}
