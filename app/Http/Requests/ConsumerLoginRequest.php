<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumerLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cons_email' => 'required|string|email',
            'cons_password' => 'required|string|min:6',
        ];
    }
}