<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'prov_fname' => 'required|string|max:255',
            'prov_lastname' => 'required|string|max:255',
            'prov_email' => 'required|string|email|max:255|unique:providers',
            'prov_password' => 'required|string|min:8|confirmed',
        ];
    }
}