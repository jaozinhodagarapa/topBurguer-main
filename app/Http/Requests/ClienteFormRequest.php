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
            'endereco' => 'required|max:120|min:20',
            'telefone' => 'required|max:11|min:10',
            //'email' => 'required|max:120|min:20',
            'cpf'=>'required|max:11|min:11|unique:clientes,cpf',
            'password' => 'required|'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages(){
        return [
            'foto.required' => 'Foto é obrigatório',
            'nome.required' => 'Nome obrigatório',
            'nome.max' => 'Nome deve conter no máximo 120 caracteres',
            'nome.min' => 'Nome deve conter no mínimo 5 caracteres',
            'endereco.required' => 'Endereço obrigatório',
            'endereco.max' => 'Endereço deve conter no máximo 120 caracteres',
            'endereco.min' => 'Telefone deve conter no mínimo 10 caracteres',
            'telefone.required' => 'Telefone obrigatório',
            'telefone.max' => 'Telefone deve conter no máximo 11 caracteres',
            'telefone.min' => 'Telefone deve conter no mínimo 10 caracteres',
            'email.required' => 'E-mail obrigatório',
            'email.max' => 'E-mail deve conter no máximo 120 caracteres',
            'email.unique' => 'E-mail já cadastrado no sistema',
            'cpf.required' => 'CPF obrigatório',
            'cpf.max' => 'CPF deve conter no máximo 11 caracteres',
            'cpf.min' => 'CPF deve conter no mínimo 11 caracteres',
            'cpf.unique' => 'CPF já foi cadastrado no sistema',
            'passwod.required' => 'Senha obrigatório',
        ];
    }
}
