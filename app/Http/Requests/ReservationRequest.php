<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:225'],
            'phone' => ['required', 'int', 'regex:/^\d{9}$/'], // 9 dígitos
            'date' => ['required', 'date', 'after_or_equal:today'],
            'hour' => ['required'],
            'number_people' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'surname.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.max' => 'El correo electrónico no puede exceder los 225 caracteres.',
            'phone.required' => 'El teléfono es obligatorio.',
            'phone.int' => 'El teléfono debe ser un número entero.',
            'date.required' => 'La fecha es obligatoria.',
            'hour.required' => 'La hora es obligatoria.',
            'number_people.required' => 'El número de personas es obligatorio.',
            'number_people.min' => 'El número de personas debe ser al menos 1.',
        ];
    }
}
