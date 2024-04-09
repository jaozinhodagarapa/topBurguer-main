<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        
        $clientesComFoto = $clientes->map(function($cliente){
            return [
                'foto' => $cliente-> foto,
                'nome' => $cliente->nome,
                'endereco' => $cliente->endereco,
                'telefone' => $cliente->telefone,
                'email' => $cliente->email, 
                'cpf' => $cliente->cpf,
                'password' => $cliente->password,
               
            ];
        });
        return response()->json($clientesComFoto);
    }

    public function store (ClienteFormRequest $request){
        $clienteData = $request->all();
        return $clienteData;
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $nomeFoto = time().'.'.$foto->getClientOriginalExtension();
            $caminhoFoto = $foto->storeAs('imagens/clientes', $nomeFoto, 'public');
            $clienteData['foto'] = $caminhoFoto;
        }
      
        $cliente = Cliente::create($clienteData);
        return response()->json(['cliente' => $cliente], 201);
    }

}

