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
        Schema::create('alumnos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('apellido');
        $table->string('dni', 8)->unique();
        $table->string('codigo')->unique();
        $table->string('grado');            // 1er, 2do, 3ro, etc.
        $table->string('seccion');          // A, B, C...
        $table->string('telefono')->nullable();
        $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
