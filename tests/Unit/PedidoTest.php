<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pedido;
use Illuminate\Support\Str;
use App\Models\Produto;
use App\Models\Cliente;

class PedidoTest extends TestCase
{
   public function test_create_pedido()
   {
        $cliente = Cliente::first();
        $produto = Produto::first();

        $pedido = new Pedido([
            'cliente_id' => $cliente->id,
            'produto_id' => $produto->id,
            'pedido_token' => Str::random(6)
        ]);

        $success = $pedido->save();

        $this->assertTrue($success);
   }

   public function test_table_pedido_has_softdelete()
   {
        $pedido = Pedido::factory()->create();
        $pedido->delete();

        $this->assertSoftDeleted('pedidos');
   }
}