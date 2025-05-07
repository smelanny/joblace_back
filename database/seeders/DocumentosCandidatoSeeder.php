<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DocumentosCandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('documentos_candidato')->insert([
            'user_id' => 1,
            'tipo_documento' => 'CV/Curriculum',
            'url_archivo' => 'cv_juan_perez.pdf',
            'fecha_subida' => now(),
        ]);
    }
}
