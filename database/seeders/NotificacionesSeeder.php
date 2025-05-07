<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NotificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notificaciones')->insert([
            'user_id' => 1, // Juan Pérez
            'mensaje' => 'Tu postulación ha sido recibida.',
            'tipo' => 'info',
            'leida' => false,
            'fecha_creacion' => now(),
        ]);
    }
}
