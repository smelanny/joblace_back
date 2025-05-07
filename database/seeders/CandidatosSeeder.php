<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CandidatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidatos')->insert([
            'user_id' => 1, // Juan Pérez
            'titulo_profesional' => 'Desarrollador Backend',
            'resumen_perfil' => 'Desarrollador con experiencia en Laravel y PHP, enfocado en soluciones backend eficientes.',
            'anos_experiencia' => 3,
            'disponibilidad' => 'tiempo_completo',
        ]);
    }
}
