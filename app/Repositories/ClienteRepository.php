<?php

namespace App\Repositories;

use App\Models\Cliente;

class ClienteRepository
{
    public function getAllClientes() 
    {
        return Cliente::all();
    }

    public function getClienteById(int $id) 
    {
        return Cliente::findOrFail($id);
    }

    public function deleteCliente(int $id) 
    {
        Cliente::destroy($id);
    }

    public function createCliente(array $attributes) 
    {
        return Cliente::create($attributes);
    }

    public function updateCliente(array $attributes, int $id) 
    {
        return Cliente::whereId($id)->update($attributes);
    }
}