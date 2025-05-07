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
        Schema::create('habilidades_candidatos', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('habilidad_id')->constrained('habilidades')->onDelete('cascade');
            $table->enum('nivel', ['basico', 'intermedio', 'avanzado']);
            $table->primary(['user_id', 'habilidad_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habilidades_candidatos');
    }
};
