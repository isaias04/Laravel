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
        Schema::table('productos', function (Blueprint $table) {
            //
            $table->string('unidad_medida')->nullable()->after('cantidad'); // Ejemplo: kg, litro, unidad
            $table->decimal('precio_unitario', 10, 2)->nullable()->after('precio'); // Precio por unidad
            $table->decimal('precio_mayoreo', 10, 2)->nullable()->after('precio_unitario'); // Precio por mayoreo
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            //
            $table->dropColumn(['unidad_medida', 'precio_unitario', 'precio_mayoreo']);
        });
    }
};
