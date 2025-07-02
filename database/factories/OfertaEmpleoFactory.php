<?php

namespace Database\Factories;

use App\Models\OfertaEmpleo;
use App\Models\Usuario;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfertaEmpleoFactory extends Factory
{
    protected $model = OfertaEmpleo::class;

    public function definition(): array
    {
        return [
            'empresa_id' => Empresa::factory(),
            'user_id' => Usuario::factory(),
            'titulo_puesto' => $this->faker->jobTitle(),
            'descripcion_puesto' => $this->faker->paragraph(),
            'tipo_jornada' => $this->faker->randomElement(['tiempo_completo', 'medio_tiempo', 'freelance', 'practica']),
            'ubicacion' => $this->faker->city(),
            'salario_estimado' => $this->faker->randomFloat(2, 1000, 5000),
            'fecha_publicacion' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['activa', 'cerrada']),
            'modalidad' => $this->faker->randomElement(['presencial', 'remoto', 'híbrido']),
        ];
    }
}
