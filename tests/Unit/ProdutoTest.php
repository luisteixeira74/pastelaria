<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Produto;

class ProdutoTest extends TestCase
{
    public function test_must_found_produto_with_key_preco(): void
    {
        $produto = Produto::first()->toArray();
        
        $this->assertArrayHasKey('preco', $produto);
    }

    public function test_produto_is_not_empty(): void
    {
        $produto = Produto::all()->count();

        $this->assertNotEmpty($produto);
    }

    public function test_produto_has_softdelete(): void
    {
        $produto = Produto::factory()->create();
        $produto->delete();

        $this->assertSoftDeleted($produto);
    }
}