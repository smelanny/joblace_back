<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        UsuariosSeeder::class,
        EmpresasSeeder::class,
        RepresentantesEmpresaSeeder::class,
        CandidatosSeeder::class,
        HabilidadesSeeder::class,
        HabilidadesCandidatosSeeder::class,
        CategoriasSeeder::class,
        OfertasEmpleoSeeder::class,
        OfertaCategoriaSeeder::class,
        PostulacionesSeeder::class,
        DocumentosCandidatoSeeder::class,       
    ]);
}
}
