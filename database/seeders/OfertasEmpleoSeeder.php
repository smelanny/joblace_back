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
            [
                'empresa_id' => 1,
                'user_id' => 9,
                'titulo_puesto' => 'Desarrollador Laravel',
                'descripcion_puesto' => 'Buscamos un desarrollador con experiencia en Laravel y MySQL.',
                'tipo_jornada' => 'tiempo_completo',
                'ubicacion' => 'San Jose, CR',
                'salario_estimado' => 1800.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'remoto',
            ],
            [
                'empresa_id' => 2,
                'user_id' => 10,
                'titulo_puesto' => 'Desarrollador Java',
                'descripcion_puesto' => 'Buscamos un desarrollador con experiencia en Java y Spring Boot.',
                'tipo_jornada' => 'tiempo_completo',
                'ubicacion' => 'Heredia, CR',
                'salario_estimado' => 1900.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'hibrido',
            ],
            [
                'empresa_id' => 1,
                'user_id' => 9,
                'titulo_puesto' => 'QA Tester',
                'descripcion_puesto' => 'Se necesita tester con experiencia en pruebas automatizadas.',
                'tipo_jornada' => 'medio_tiempo',
                'ubicacion' => 'Alajuela, CR',
                'salario_estimado' => 1200.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'remoto',
            ],
            [
                'empresa_id' => 2,
                'user_id' => 10,
                'titulo_puesto' => 'Diseñador UX/UI',
                'descripcion_puesto' => 'Encargado de mejorar la experiencia de usuario en nuestras plataformas.',
                'tipo_jornada' => 'tiempo_completo',
                'ubicacion' => 'Cartago, CR',
                'salario_estimado' => 1500.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'presencial',
            ],
            [
                'empresa_id' => 1,
                'user_id' => 9,
                'titulo_puesto' => 'Administrador de Base de Datos',
                'descripcion_puesto' => 'Responsable de la administración y mantenimiento de bases de datos.',
                'tipo_jornada' => 'tiempo_completo',
                'ubicacion' => 'San Jose, CR',
                'salario_estimado' => 2000.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'hibrido',
            ],
            [
                'empresa_id' => 2,
                'user_id' => 10,
                'titulo_puesto' => 'Soporte Técnico',
                'descripcion_puesto' => 'Atención al cliente y resolución de problemas técnicos.',
                'tipo_jornada' => 'medio_tiempo',
                'ubicacion' => 'Limón, CR',
                'salario_estimado' => 1000.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'remoto',
            ],
            [
                'empresa_id' => 1,
                'user_id' => 9,
                'titulo_puesto' => 'Analista de Datos',
                'descripcion_puesto' => 'Interpretación y análisis de datos para la toma de decisiones.',
                'tipo_jornada' => 'tiempo_completo',
                'ubicacion' => 'Puntarenas, CR',
                'salario_estimado' => 1700.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'hibrido',
            ],
            [
                'empresa_id' => 2,
                'user_id' => 10,
                'titulo_puesto' => 'Ingeniero de Redes',
                'descripcion_puesto' => 'Configuración y mantenimiento de redes empresariales.',
                'tipo_jornada' => 'tiempo_completo',
                'ubicacion' => 'Guanacaste, CR',
                'salario_estimado' => 2100.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'presencial',
            ],
            [
                'empresa_id' => 1,
                'user_id' => 9,
                'titulo_puesto' => 'Scrum Master',
                'descripcion_puesto' => 'Liderar equipos ágiles y facilitar reuniones SCRUM.',
                'tipo_jornada' => 'tiempo_completo',
                'ubicacion' => 'San Jose, CR',
                'salario_estimado' => 2200.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'hibrido',
            ],
            [
                'empresa_id' => 2,
                'user_id' => 10,
                'titulo_puesto' => 'Community Manager',
                'descripcion_puesto' => 'Manejo de redes sociales y campañas digitales.',
                'tipo_jornada' => 'medio_tiempo',
                'ubicacion' => 'Heredia, CR',
                'salario_estimado' => 1300.00,
                'fecha_publicacion' => now(),
                'estado' => 'activa',
                'modalidad' => 'remoto',
            ],
        ]);
    }
}
