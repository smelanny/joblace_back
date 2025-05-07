<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HabilidadesCandidatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('habilidades_candidatos')->insert([
            ['user_id' => 1, 'habilidad_id' => 1], // PHP
            ['user_id' => 1, 'habilidad_id' => 2], // Laravel
        ]);
    }
}
