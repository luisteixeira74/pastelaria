<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:100',
            'email' => 'required|email|unique:clientes',
            'telefone' => 'required|min:3|max:11',
            'data_nascimento' => 'required|max:10',
            'endereço' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cep' => 'required',
        ];
    }
}
