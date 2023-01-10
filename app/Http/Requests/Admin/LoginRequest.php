<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "Email є обов'язковим полем до заповнення",
            'email.email' => "Email не є валідним",
            'password.required' => "Пароль є обов'язковим полем до заповнення",
        ];
    }
}
