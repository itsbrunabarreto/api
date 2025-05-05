<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutorRequest extends FormRequest
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
            'email' => 'required|string|email|max:100|unique:autores,email',
            'nome' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'endereco' => 'required|string|max:100',
            'bairro' => 'required|string|max:100',
            'cep' => 'required|string|max:20',
            'telefone' => 'required|string|max:100',
        ];
    }
}
