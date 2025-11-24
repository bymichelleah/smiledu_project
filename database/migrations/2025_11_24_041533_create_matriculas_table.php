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
        Schema::create('matriculas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
        $table->string('periodo');
        $table->string('telefono')->nullable();
        $table->date('fecha_matricula');
        $table->string('estado');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
