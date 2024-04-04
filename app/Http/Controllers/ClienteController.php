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
                'nome' => $cliente->nome,
                'telefone' => $cliente->telefone,
                'endereco' => $cliente->endereco,
                'email' => $cliente->email, 
                'password' => $cliente->password,
                'foto' => asset('storage/' . $cliente->foto),
            ];
        });
        return response()->json($clientesComFoto);
    }

    public function store (Request $request){
        $produtoData = $request->all();

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

