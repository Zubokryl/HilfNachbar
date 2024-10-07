<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumerRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cons_fname' => 'required|string|max:255',
            'cons_lastname' => 'required|string|max:255',
            'cons_email' => 'required|string|email|max:255|unique:consumers',
            'cons_password' => 'required|string|min:8|confirmed',
        ];
    }
}