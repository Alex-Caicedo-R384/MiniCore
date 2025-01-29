<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id(); // id del gasto
            $table->date('fecha'); // fecha del gasto
            $table->string('descripcion', 255); // descripción del gasto
            $table->decimal('monto', 15, 2); // monto del gasto
            $table->unsignedBigInteger('empleado_id'); // id del empleado
            $table->unsignedBigInteger('departamento_id'); // id del departamento

            // Relaciones
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
