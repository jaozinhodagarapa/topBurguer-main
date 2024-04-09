<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoFormRequest extends FormRequest
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
            'nome' => 'required|max:120|min:5',
            'preco' => 'required|decimal:10,2',
            'indredientes' => 'required|max:400|min:20',
            'imagem' => 'required',
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
        'nome.required' => 'O campo nome é obrigatorio',
        'nome.max' => 'o campo nome deve conter no maximo 120 caracteres',
        'nome.min' => 'o campo nome deve conter no minimo 5 caracteres',
        'preco.required' => 'O campo preço é obrigatorio',
        'preco.decimal' => 'O campo deve ser em dicimal',
        'ingredientes.required' => 'O campo ingredientes é obrigatorio',
        'ingredientes.max' => 'o campo ingredientes deve conter no maximo 400 caracteres',
        'ingredientes.min' => 'o campo ingredientes deve conter no minimo 20 caracteres',
        'imagem.required' => 'Imagem é obrigatorio',

    ];
}
}
