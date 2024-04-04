<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lanches = [
            [
                'nome' => 'Burguer 1',
                'preco' => 17.99,
                'ingredientes' => 'Hamburguer de carne, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 2',
                'preco' => 18.99,
                'ingredientes' => 'Hamburguer de frango, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 3',
                'preco' => 19.99,
                'ingredientes' => 'Hamburguer de porco, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 4',
                'preco' => 20.99,
                'ingredientes' => 'Hamburguer de cachorro, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 5',
                'preco' => 21.99,
                'ingredientes' => 'Hamburguer de galinha, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 6',
                'preco' => 22.99,
                'ingredientes' => 'Hamburguer de gato, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 7',
                'preco' => 23.99,
                'ingredientes' => 'Hamburguer de rato, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 8',
                'preco' => 24.99,
                'ingredientes' => 'Hamburguer de veado, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 9',
                'preco' => 25.99,
                'ingredientes' => 'Hamburguer de alce, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ],
            [
                'nome' => 'Burguer 10',
                'preco' => 26.99,
                'ingredientes' => 'Hamburguer de elefante, queijo, bacon, queijo, alface, tomate',
                'imagem' => 'images/hamburgao.jpeg'
            ]
        ];

        foreach ($lanches as $lanche) {
            DB::table('produtos')->insert([
                'nome' => $lanche['nome'],
                'preco' => $lanche['preco'],
                'ingredientes' => $lanche['ingredientes'],
                'imagem' => $lanche['imagem'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
