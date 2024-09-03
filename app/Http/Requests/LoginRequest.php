<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Authorization logic can be implemented here if needed
    }

    public function rules()
    {
        return [
            'email' => ['email','required'],
            'password' => ['string', 'min:8', 'required'],
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator, response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
