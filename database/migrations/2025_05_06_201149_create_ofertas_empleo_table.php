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
        Schema::create('ofertas_empleo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas');
            $table->foreignId('user_id')->constrained('usuarios');
            $table->string('titulo_puesto');
            $table->text('descripcion_puesto');
            $table->enum('tipo_contrato', ['tiempo_completo', 'medio_tiempo', 'freelance', 'practica']);
            $table->string('ubicacion');
            $table->decimal('salario_estimado', 10, 2);
            $table->date('fecha_publicacion');
            $table->enum('estado', ['activa', 'cerrada', 'cancelada']);
            $table->enum('modalidad', ['presencial', 'remoto', 'hibrido']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas_empleo');
    }
};
