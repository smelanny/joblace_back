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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id('notificacion_id');
            $table->foreignId('user_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('mensaje');
            $table->enum('tipo', ['info', 'advertencia', 'alerta']);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->boolean('leida')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
