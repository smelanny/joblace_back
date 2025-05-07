<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RepresentantesEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('representantes_empresa')->insert([
            'user_id' => 2, // María López
            'empresa_id' => 1,
            'cargo' => 'Manager',
            'telefono_contacto' => '####-####',
        ]);
    }
}
