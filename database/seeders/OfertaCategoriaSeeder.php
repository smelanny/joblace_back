<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OfertaCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('oferta_categoria')->insert([
            'oferta_id' => 1,
            'categoria_id' => 1, // Desarrollo de Software
            'fecha_asociacion' => now(),
        ]);
    }
}
