<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            // Candidatos
            [
                'nombre' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Ana García',
                'email' => 'ana@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Carlos Martínez',
                'email' => 'carlos@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Laura Rodríguez',
                'email' => 'laura@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Miguel Sánchez',
                'email' => 'miguel@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Sofía Hernández',
                'email' => 'sofia@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'David González',
                'email' => 'david@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Elena Fernández',
                'email' => 'elena@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            
            // Representantes de empresa
            [
                'nombre' => 'María López',
                'email' => 'maria@example.com',
                'contrasena_hash' => bcrypt('password123'),
                'tipo_usuario' => 'representante_empresa',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Roberto Jiménez',
                'email' => 'roberto@empresa.com',
                'contrasena_hash' => bcrypt('empresa123'),
                'tipo_usuario' => 'representante_empresa',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Patricia Ruiz',
                'email' => 'patricia@techcorp.com',
                'contrasena_hash' => bcrypt('techcorp2023'),
                'tipo_usuario' => 'representante_empresa',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Javier Moreno',
                'email' => 'javier@innovaciones.com',
                'contrasena_hash' => bcrypt('innovaciones456'),
                'tipo_usuario' => 'representante_empresa',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Lucía Díaz',
                'email' => 'lucia@digital-solutions.com',
                'contrasena_hash' => bcrypt('digitalsol789'),
                'tipo_usuario' => 'representante_empresa',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'Alejandro Castro',
                'email' => 'alejandro@global-enterprise.com',
                'contrasena_hash' => bcrypt('globalenterprise'),
                'tipo_usuario' => 'representante_empresa',
                'fecha_creacion' => now(),
            ],
        ]);
    }
}
