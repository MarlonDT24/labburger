<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address' => ['required', 'string'],
            'portal' => ['required', 'string'],
            'door' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
            'email' => ['required', 'string', 'email', 'max:225'],
            'phone' => ['required', 'string', 'regex:/^\d{9}$/'], // 9 dígitos
            'payment_method' => ['required', 'in:bank,paypal,credit_card'],
            'card_number' => ['nullable', 'string', 'regex:/^\d{16}$/'], // 16 dígitos
            'card_name' => ['nullable', 'string'],
            'card_expiration' => ['nullable', 'string', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'], // MM/AA
            'card_cvc' => ['nullable', 'string', 'regex:/^\d{3}$/'], // 3 dígitos
            'paypal_email' => ['nullable', 'string', 'email', 'max:225'],
            'bank_owner' => ['nullable', 'string'],
            'bank_iban' => ['nullable', 'string', 'regex:/^[A-Z]{2}\d{2}[A-Z0-9]{1,30}$/'], // Formato IBAN
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'surname.required' => 'Los apellidos son obligatorios',
            'address.required' => 'La dirección es obligatoria',
            'portal.required' => 'El portal es obligatorio',
            'door.required' => 'La puerta es obligatoria',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico debe ser válido',
            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.regex' => 'El número de teléfono debe tener 9 dígitos',
            'payment_method.required' => 'El método de pago es obligatorio',
            'card_number.regex' => 'El número de tarjeta debe tener 16 dígitos',
            'card_name.required' => 'El nombre del titular de la tarjeta es obligatorio',
            'card_expiration.regex' => 'La fecha de expiración debe estar en formato MM/AA',
            'card_cvc.regex' => 'El CVC debe tener 3 dígitos',
            // Otros mensajes personalizados según sea necesario
            'paypal_email.email' => 'El correo electrónico de PayPal debe ser válido',
            'bank_iban.regex' => 'El IBAN debe seguir el formato correcto (ej: ES12 3456 7890 1234 5678 9012)',
            'bank_owner.required' => 'El titular de la cuenta bancaria es obligatorio',
            'bank_iban.required' => 'El IBAN es obligatorio',
        ];
    }
}
