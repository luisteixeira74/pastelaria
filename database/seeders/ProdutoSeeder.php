<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::factory()->count(8)
            ->state(new Sequence(
                [
                    'nome' => 'Pastel de Queijo',
                    'foto' => 'pastel_img1.png'
                ],
                [
                    'nome' => 'Pastel de Carne',
                    'foto' => 'pastel_img2.png'
                ],
                [
                    'nome' => 'Pastel de Calabresa',
                    'foto' => 'pastel_img3.png'
                ],
                [
                    'nome' => 'Pastel de Ricota',
                    'foto' => 'pastel_img4.png'
                ],
                [
                    'nome' => 'Pastel de Pizza',
                    'foto' => 'pastel_img5.png'
                ],
                [
                    'nome' => 'Pastel de Palmito',
                    'foto' => 'pastel_img6.png'
                ],
                [
                    'nome' => 'Pastel de Bauru',
                    'foto' => 'pastel_img7.png'
                ],
                [
                    'nome' => 'Pastel de X-Tudo',
                    'foto' => 'pastel_img8.png'
                ]
            ))
        ->create();
    }
}
