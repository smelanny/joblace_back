<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\OfertaEmpleo;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class OfertaEmpleoControllerTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function puede_buscar_ofertas_por_texto_modalidad_jornada_y_categoria()
    {
        $empresa = Empresa::factory()->create(['nombre' => 'TechCorp']);
        $usuario = Usuario::factory()->create();
        $categoria = Categoria::factory()->create();


        $oferta = OfertaEmpleo::factory()->create([
            'empresa_id' => $empresa->id,
            'user_id' => $usuario->id,
            'titulo_puesto' => 'Ingeniero Backend',
            'descripcion_puesto' => 'Desarrollar servicios en Laravel',
            'modalidad' => 'remoto',
            'tipo_jornada' => 'tiempo_completo'
        ]);

        // Asociar categoría a la oferta
        $oferta->categorias()->attach($categoria->id, ['fecha_asociacion' => now()]);

        // Autenticar al usuario
        Sanctum::actingAs($usuario);

        // Realizar búsqueda
        $response = $this->getJson("/api/ofertas/buscar?busqueda=laravel&modalidad=remoto&tipo_jornada=tiempo_completo&categoria_id={$categoria->id}");

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment(['titulo_puesto' => 'Ingeniero Backend']);
    }
}
