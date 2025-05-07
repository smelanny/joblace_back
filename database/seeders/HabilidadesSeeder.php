<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HabilidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('habilidades')->insert([
            ['nombre_habilidad' => 'PHP'],
            ['nombre_habilidad' => 'Laravel'],
            ['nombre_habilidad' => 'JavaScript'],
        ]);
    }
}
