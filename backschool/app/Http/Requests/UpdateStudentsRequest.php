<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateStudentsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'edad' => 'required',
            'carrera' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|string|email|max:255|unique:students,email,'.$this->id,
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'cuatrimestre' => 'nullable|integer|min:1|max:8',
            'genero' => 'nullable|in:masculino,femenino',
            'created_at' => 'nullable|date',
        ];
    }
}
