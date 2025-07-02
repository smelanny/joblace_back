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

    #[\PHPUnit\Framework\Attributes\Test]
    public function puede_actualizar_estado_de_postulacion_y_cerrar_oferta_si_es_aceptada()
    {
        // Crear datos de prueba
        $empresa = Empresa::factory()->create();
        $usuario = Usuario::factory()->create();

        $oferta = OfertaEmpleo::factory()->create([
            'empresa_id' => $empresa->id,
            'user_id' => $usuario->id,
            'estado' => 'activa'
        ]);

        $postulacion = Postulacion::factory()->create([
            'user_id' => $usuario->id,
            'oferta_id' => $oferta->id,
            'estado' => 'pendiente'
        ]);

        // Autenticar al usuario
        Sanctum::actingAs($usuario);

        // Enviar petición para aceptar la postulación
        $response = $this->putJson("/api/postulaciones/{$postulacion->postulacion_id}/estado", [
            'estado' => 'aceptado'
        ]);

        // Verificar estado actualizado de la postulación
        $response->assertStatus(200)
            ->assertJson([
                'postulacion' => [
                    'estado' => 'aceptado',
                ],
            ]);

        // Verificar que la oferta fue cerrada
        $this->assertDatabaseHas('ofertas_empleo', [
            'id' => $oferta->id,
            'estado' => 'cerrada'
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function envia_notificacion_cuando_se_actualiza_estado_de_postulacion()
    {
        // Simular notificaciones
        \Illuminate\Support\Facades\Notification::fake();

        // Crear datos de prueba
        $empresa = Empresa::factory()->create();
        $usuario = Usuario::factory()->create();

        $oferta = OfertaEmpleo::factory()->create([
            'empresa_id' => $empresa->id,
            'user_id' => $usuario->id,
            'estado' => 'activa',
        ]);

        $postulacion = Postulacion::factory()->create([
            'user_id' => $usuario->id,
            'oferta_id' => $oferta->id,
            'estado' => 'pendiente',
        ]);

        // Autenticar al usuario (quien hace la acción)
        Sanctum::actingAs($usuario);

        // Ejecutar el cambio de estado
        $this->putJson("/api/postulaciones/{$postulacion->postulacion_id}/estado", [
            'estado' => 'aceptado'
        ])->assertStatus(200);

        // Verificar que se haya enviado una notificación al usuario
        \Illuminate\Support\Facades\Notification::assertSentTo(
            [$usuario],
            \App\Notifications\EstadoPostulacionActualizado::class
        );
    }
}
