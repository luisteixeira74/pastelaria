<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->numerify('11########'),
            'data_nascimento' => '01-01-1990',
            'endereço' => fake()->text(100),
            'complemento' => fake()->text(30),
            'bairro' => fake()->text(10),
            'cep' => fake()->numerify('########'),
        ];
    }
}
