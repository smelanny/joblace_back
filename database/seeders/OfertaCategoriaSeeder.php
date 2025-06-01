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
            // Oferta 1: Desarrollador Laravel
            ['oferta_id' => 1, 'categoria_id' => 1, 'fecha_asociacion' => now()], // Desarrollo de Software
            ['oferta_id' => 1, 'categoria_id' => 4, 'fecha_asociacion' => now()], // Desarrollo Web

            // Oferta 2: Desarrollador Java
            ['oferta_id' => 2, 'categoria_id' => 1, 'fecha_asociacion' => now()], // Desarrollo de Software
            ['oferta_id' => 2, 'categoria_id' => 5, 'fecha_asociacion' => now()], // Desarrollo Móvil

            // Oferta 3: QA Tester
            ['oferta_id' => 3, 'categoria_id' => 1, 'fecha_asociacion' => now()], // Desarrollo de Software
            ['oferta_id' => 3, 'categoria_id' => 10, 'fecha_asociacion' => now()], // Finanzas (por lógica de métricas y control)

            // Oferta 4: Diseñador UX/UI
            ['oferta_id' => 4, 'categoria_id' => 6, 'fecha_asociacion' => now()], // Diseño UI/UX
            ['oferta_id' => 4, 'categoria_id' => 2, 'fecha_asociacion' => now()], // Diseño Gráfico

            // Oferta 5: Administrador de BD
            ['oferta_id' => 5, 'categoria_id' => 1, 'fecha_asociacion' => now()], // Desarrollo de Software
            ['oferta_id' => 5, 'categoria_id' => 9, 'fecha_asociacion' => now()], // Administración

            // Oferta 6: Soporte Técnico
            ['oferta_id' => 6, 'categoria_id' => 8, 'fecha_asociacion' => now()], // Atención al Cliente
            ['oferta_id' => 6, 'categoria_id' => 1, 'fecha_asociacion' => now()], // Desarrollo de Software

            // Oferta 7: Analista de Datos
            ['oferta_id' => 7, 'categoria_id' => 1, 'fecha_asociacion' => now()], // Desarrollo de Software
            ['oferta_id' => 7, 'categoria_id' => 10, 'fecha_asociacion' => now()], // Finanzas

            // Oferta 8: Ingeniero de Redes
            ['oferta_id' => 8, 'categoria_id' => 1, 'fecha_asociacion' => now()], // Desarrollo de Software
            ['oferta_id' => 8, 'categoria_id' => 9, 'fecha_asociacion' => now()], // Administración

            // Oferta 9: Scrum Master
            ['oferta_id' => 9, 'categoria_id' => 1, 'fecha_asociacion' => now()], // Desarrollo de Software
            ['oferta_id' => 9, 'categoria_id' => 11, 'fecha_asociacion' => now()], // Recursos Humanos

            // Oferta 10: Community Manager
            ['oferta_id' => 10, 'categoria_id' => 3, 'fecha_asociacion' => now()], // Marketing Digital
            ['oferta_id' => 10, 'categoria_id' => 7, 'fecha_asociacion' => now()], // Ventas
        ]);
    }
}
