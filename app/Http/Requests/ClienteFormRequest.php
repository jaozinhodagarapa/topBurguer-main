<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
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
            'foto' => 'required',
            'nome' => 'required|max:120|min:5',
            'telefone' => 'required|max:11|min:10',
            'endereco' => 'required|endereco|max:120|',
            'email' => 'required|email|max:120|unique:clientes,email',
            'password' => 'required',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
}

    public function messages(){
        return [
            'foto.required' => 'Foto é obrigatorio',
            'nome.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'o campo nome deve conter no maximo 120 caracteres',
            'nome.min' => 'o campo nome deve conter no minimo 5 caracteres',
            'telefone.required' => 'O campo telefone é obrigatorio',
            'telefone.max' => 'o campo telefone deve conter no maximo 11 caracteres',
            'telefone.min' => 'o campo telefone deve conter no minimo 10 caracteres',
            'enedereco.required' => 'O campo endereço é obrigatorio',
            'endereco.max' => 'o campo endereço deve conter no maximo 120 caracteres',
            'endereco.min' => 'o campo endereço deve conter no minimo 50 caracteres',
            'email.unique' => 'o email ja foi cadastrado',
            'email.required' => 'este campo é obrigatorio',
            'email.max' => 'o campo email deve conter no maximo 120 caracteres',
            'email.email' => 'Email invalido',
            'password.required' => 'o campo senha é obrigatorio',

        ];
    }
}