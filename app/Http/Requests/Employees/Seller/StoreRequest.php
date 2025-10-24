<?php

namespace App\Http\Requests\Employees\Seller;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Use the FormRequest user() helper (avoids undefined method errors from static analyzers)
        return ($this->user()?->hasRole('admin')) ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Datos de acceso
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:50|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',

            // Datos personales
            'dni' => 'required|string|max:15|unique:employees,dni',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',

            // Datos del vendedor
            'line' => 'required|string|max:50',
            'notes' => 'nullable|string',
            'years_experience' => 'nullable|integer|min:0',
        ];
    }
}
