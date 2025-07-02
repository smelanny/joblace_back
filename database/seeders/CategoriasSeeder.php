<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Desarrollo de Software'],
            ['nombre' => 'Diseño Gráfico'],
            ['nombre' => 'Marketing Digital'],
            ['nombre' => 'Desarrollo Web'],
            ['nombre' => 'Desarrollo Móvil'],
            ['nombre' => 'Diseño UI/UX'],
            ['nombre' => 'Ventas'],
            ['nombre' => 'Atención al Cliente'],
            ['nombre' => 'Administración'],
            ['nombre' => 'Finanzas'],
            ['nombre' => 'Recursos Humanos'],
            ['nombre' => 'Ciberseguridad'],
            ['nombre' => 'Ciencia de Datos'],
            ['nombre' => 'Gestión de Proyectos'],
            ['nombre' => 'Soporte Técnico'],
            ['nombre' => 'Inteligencia Artificial'],
        ]);
    }
}
