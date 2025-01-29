<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            // Asegúrate de agregar la columna 'nombre'
            $table->string('nombre', 100); // Añadir la columna 'nombre'
        });
    }

    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            // Eliminar la columna 'nombre' si revertimos la migración
            $table->dropColumn('nombre');
        });
    }
};
