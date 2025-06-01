<?php

namespace Tests\Feature;

use App\Models\Empresa;
use App\Models\Usuario;
use App\Models\OfertaEmpleo;
use App\Models\Postulacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PostulacionControllerTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function puede_mostrar_postulaciones_por_empresa()
    {
        // Crear datos de prueba
        $empresa = Empresa::factory()->create();
        $usuario = Usuario::factory()->create();

        $oferta = OfertaEmpleo::factory()->create([
            'empresa_id' => $empresa->id,
            'user_id' => $usuario->id
        ]);

        Postulacion::factory()->create([
            'user_id' => $usuario->id,
            'oferta_id' => $oferta->id,
            'estado' => 'pendiente'
        ]);

        // Autenticar al usuario
        Sanctum::actingAs($usuario);

        // Llamar al endpoint
        $response = $this->getJson("/api/empresas/{$empresa->id}/postulaciones");

        // Verificar respuesta
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['postulacion_id', 'user_id', 'oferta_id', 'fecha_postulacion', 'estado']
        ]);
    }
}
