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
            [
                'nombre' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'contrasena_hash' => bcrypt('password'),
                'tipo_usuario' => 'candidato',
                'fecha_creacion' => now(),
            ],
            [
                'nombre' => 'María López',
                'email' => 'maria@example.com',
                'contrasena_hash' => bcrypt('password'),
                'tipo_usuario' => 'representante_empresa',
                'fecha_creacion' => now(),
            ],
        ]);
    }
}
