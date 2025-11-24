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
        Schema::create('cursos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->integer('creditos')->default(0);
        $table->unsignedBigInteger('docente_id')->nullable(); // FK opcional
        $table->string('imagen')->nullable(); // ruta de imagen/fondo para la card
        $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
        $table->timestamps();

        $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
