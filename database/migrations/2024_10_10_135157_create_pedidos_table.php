<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('pedido_token');
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('cliente_id')->constrained(
                table: 'clientes', indexName: 'pedidos_cliente_id'
            )->onDelete('cascade');
            $table->foreignId('produto_id')->constrained(
                table: 'produtos', indexName: 'pedidos_produto_id'
            )->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
