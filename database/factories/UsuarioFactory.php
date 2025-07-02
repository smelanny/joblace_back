<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'contrasena_hash' => Hash::make('password'),
            'tipo_usuario' => $this->faker->randomElement(['candidato', 'representante_empresa']),
            'ultima_actividad' => now(),
        ];
    }
}
