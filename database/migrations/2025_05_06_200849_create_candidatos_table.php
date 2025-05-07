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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id('perfil_id');
            $table->foreignId('user_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('titulo_profesional');
            $table->text('resumen_perfil');
            $table->integer('anos_experiencia');
            $table->enum('disponibilidad', ['tiempo_completo', 'medio_tiempo', 'freelance', 'practica']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
