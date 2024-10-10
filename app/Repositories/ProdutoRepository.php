<?php

namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository
{
    public function getAllProduto() 
    {
        return Produto::all();
    }

    public function getProdutoById(int $id) 
    {
        return PRoduto::find($id);
    }

    public function deleteProduto(int $id) 
    {
        Produto::destroy($id);
    }

    public function createProduto(array $attributes) 
    {
        return Produto::create($attributes);
    }

    public function updateProduto(array $attributes, int $id) 
    {
        return Produto::whereId($id)->update($attributes);
    }
}