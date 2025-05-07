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
        Schema::create('documentos_candidato', function (Blueprint $table) {
            $table->id('documento_id');
            $table->foreignId('user_id')->constrained('usuarios')->onDelete('cascade');
            $table->enum('tipo_documento', ['CV/Currículum', 'Carta de presentación', 'Certificados académicos', 'Referencias laborales', 'Portafolio']);
            $table->string('url_archivo');
            $table->date('fecha_subida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos_candidato');
    }
};
