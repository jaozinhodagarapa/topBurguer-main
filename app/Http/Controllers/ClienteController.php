<?php

namespace App\Http\Controllers;

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
                'senha' => $cliente->senha,
               
            ];
        });
        return response()->json($clientesComFoto);
    }

    public function store (Request $request){
        $clienteData = $request->all();

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagens/produtos', $nomeImagem, 'public');
            $produtoData['imagem'] = $caminhoImagem;
        }
        $cliente = Cliente::create($produtoData);
        return response()->json(['produto' => $cliente], 201);
    }
    
}

