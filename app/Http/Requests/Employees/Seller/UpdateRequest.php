<?php

namespace App\Http\Requests\Employees\Seller;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return ($this->user()?->hasRole('admin')) ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $sellerId = $this->route('seller')->id;
        $employeeId = $this->route('seller')->employee_id;
        $userId = $this->route('seller')->employee->user_id;

        return [
            // Datos de acceso
            'name' => 'required|string|max:255',
            'username' => "nullable|string|max:50|unique:users,username,$userId",
            'email' => "required|email|unique:users,email,$userId",

            // Datos personales
            'dni' => "required|string|max:15|unique:employees,dni,$employeeId",
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',

            // Datos del vendedor
            'line' => 'required|string|max:50',
            'notes' => 'nullable|string',
            'years_experience' => 'nullable|integer|min:0',
        ];
    }
}
