<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    public function test_must_found_cliente(): void
    {
        $cliente = Cliente::factory()->create();

        $this->assertIsString($cliente->nome);
    }

    public function test_cliente_can_create(): void
    {
        $fakeEmail = fake()->companyEmail();

        $clienteData = [
            'nome' => '',
            'email' => $fakeEmail,
            'telefone' => '1199998888',
            'data_nascimento' => '01-01-1999',
            'endereço' => 'Rua Teste teste',
            'complemento' => 'apto 1123',
            'bairro' => 'Bairro teste',
            'cep' => '05778080',
        ];

        $cliente = new Cliente($clienteData);

        //$cliente->assertStatus(201);
        $this->assertEquals($fakeEmail, $cliente->email);
    }

    public function test_exception_when_create_cliente_with_same_email(): void
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        $clienteFound = Cliente::find(1);

        //tenta cadastrar um cliente com o mesmo email
        $fakeCliente = Cliente::factory()->create(
            ['email' => $clienteFound->email]
        )->toArray();
    }

    public function teste_cliente_has_softdelete(): void
    {
        $cliente = Cliente::factory()->create();
        $cliente->delete();

        $this->assertSoftDeleted($cliente);
    }
}