<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_crear_usuario_candidato()
    {
        $usuario = Usuario::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'contrasena_hash' => bcrypt('password123'),
            'tipo_usuario' => 'candidato',
            'ultima_actividad' => Carbon::now()
        ]);

        $this->assertInstanceOf(Usuario::class, $usuario);
        $this->assertEquals('Juan Pérez', $usuario->nombre);
        $this->assertEquals('candidato', $usuario->tipo_usuario);
        $this->assertTrue($usuario->esCandidato());
        $this->assertFalse($usuario->esRepresentanteEmpresa());
        $this->assertNotNull($usuario->fecha_creacion);
        $this->assertNotNull($usuario->ultima_actividad);
    }

    public function test_puede_crear_usuario_representante()
    {
        $usuario = Usuario::create([
            'nombre' => 'María García',
            'email' => 'maria@empresa.com',
            'contrasena_hash' => bcrypt('password123'),
            'tipo_usuario' => 'representante_empresa',
            'ultima_actividad' => Carbon::now()
        ]);

        $this->assertInstanceOf(Usuario::class, $usuario);
        $this->assertEquals('María García', $usuario->nombre);
        $this->assertEquals('representante_empresa', $usuario->tipo_usuario);
        $this->assertTrue($usuario->esRepresentanteEmpresa());
        $this->assertFalse($usuario->esCandidato());
        $this->assertNotNull($usuario->fecha_creacion);
        $this->assertNotNull($usuario->ultima_actividad);
    }

    public function test_email_debe_ser_unico()
    {
        Usuario::create([
            'nombre' => 'Juan Pérez',
            'email' => 'test@example.com',
            'contrasena_hash' => bcrypt('password123'),
            'tipo_usuario' => 'candidato',
            'ultima_actividad' => Carbon::now()
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Usuario::create([
            'nombre' => 'Otro Usuario',
            'email' => 'test@example.com', // Mismo email
            'contrasena_hash' => bcrypt('password123'),
            'tipo_usuario' => 'candidato',
            'ultima_actividad' => Carbon::now()
        ]);
    }

    public function test_contrasena_esta_hasheada()
    {
        $password = 'password123';
        $usuario = Usuario::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'contrasena_hash' => bcrypt($password),
            'tipo_usuario' => 'candidato',
            'ultima_actividad' => Carbon::now()
        ]);

        $this->assertNotEquals($password, $usuario->contrasena_hash);
        $this->assertTrue(password_verify($password, $usuario->contrasena_hash));
    }

    public function test_fecha_creacion_se_establece_automaticamente()
    {
        $ahora = Carbon::now();
        Carbon::setTestNow($ahora);

        $usuario = Usuario::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'contrasena_hash' => bcrypt('password123'),
            'tipo_usuario' => 'candidato',
            'ultima_actividad' => $ahora
        ]);

        $this->assertNotNull($usuario->fecha_creacion);
        $this->assertInstanceOf(Carbon::class, $usuario->fecha_creacion);
        $this->assertEquals($ahora->format('Y-m-d H:i:s'), $usuario->fecha_creacion->format('Y-m-d H:i:s'));
    }

    public function test_ultima_actividad_puede_ser_actualizada()
    {
        $usuario = Usuario::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'contrasena_hash' => bcrypt('password123'),
            'tipo_usuario' => 'candidato',
            'ultima_actividad' => Carbon::now()
        ]);

        $nuevaActividad = Carbon::now()->addHours(2);
        $usuario->ultima_actividad = $nuevaActividad;
        $usuario->save();

        $this->assertEquals($nuevaActividad->format('Y-m-d H:i:s'), $usuario->ultima_actividad->format('Y-m-d H:i:s'));
    }
} 