<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empresas')->insert([
            [
                'nombre' => 'TechCorp',
                'descripcion' => 'Empresa de tecnología innovadora',
                'industria' => 'Tecnología',
                'sitio_web' => null,
                'logo_url' => null,
            ],
            [
                'nombre' => 'EcoMundo',
                'descripcion' => 'Soluciones ecológicas y sostenibles',
                'industria' => 'Medio Ambiente',
                'sitio_web' => null,
                'logo_url' => null,
            ],
        ]);
    }
}
