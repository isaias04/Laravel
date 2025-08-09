<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Producto::factory()->count(20)->create();
        \App\Models\Producto::factory()->create([
            'cantidad' => 10,
            'unidad_medida' => 'kg',
            'precio' => 100.00,
            'precio_unitario' => 10.00,
            'precio_mayoreo' => 90.00,
            'imagen' => 'producto_prueba.jpg',
        ]);
    }
}
