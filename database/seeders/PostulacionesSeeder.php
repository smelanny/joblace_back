<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostulacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('postulaciones')->insert([
            'user_id' => 1, // candidato
            'oferta_id' => 1, // oferta publicada
            'fecha_postulacion' => now(),
            'estado' => 'pendiente',
        ]);
    }
}
