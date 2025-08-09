<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre' => $this->faker->word(),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'unidad_medida' => $this->faker->randomElement(['kg', 'lt', 'pz']),
            'precio' => $this->faker->randomFloat(2, 10, 500),
            'precio_unitario' => $this->faker->randomFloat(2, 1, 50),
            'precio_mayoreo' => $this->faker->randomFloat(2, 5, 400),
            'imagen' => 'producto.jpg',
        ];
    }
}
