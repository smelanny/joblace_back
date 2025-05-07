<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OfertasEmpleoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ofertas_empleo')->insert([
            'empresa_id' => 1,
            'user_id' => 1,
            'titulo_puesto' => 'Desarrollador Laravel',
            'descripcion_puesto' => 'Buscamos un desarrollador con experiencia en Laravel y MySQL.',
            'tipo_jornada' => 'tiempo_completo',
            'ubicacion' => 'San Jose, CR',
            'salario_estimado' => 1800.00,
            'fecha_publicacion' => now(),
            'estado' => 'activa',
            'modalidad' => 'remoto',
        ]);
    }
}
