<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'phone' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'min:8', 'max:225', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[\W_]/', Password::default()],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El nombre es obligatorio',

            'surname.required' => 'Los apellidos son obligatorios',

            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.unique' => 'El número de teléfono ya existe en el sistema',

            'email.required' => 'El correo electrónico es obligatorio',
            'email.min' => 'El correo electrónico debe tener como mínimo 8 carácteres',
            'email.max' => 'El correo electrónico debe tener como máximo 225 carácteres',
            'email.unique' => 'El correo electrónico ya existe en el sistema',

            'password.required' => 'La contraseña es obligatoria',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña debe tener como mínimo 8 caracteres',
            'password.regex' => 'La contraseña debe contener al menos una letra mayúscula, un número y un símbolo',
        ];
    }
}
