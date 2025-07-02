<?php

namespace Database\Factories;

use App\Models\Postulacion;
use App\Models\Usuario;
use App\Models\OfertaEmpleo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostulacionFactory extends Factory
{
    protected $model = Postulacion::class;

    public function definition(): array
    {
        return [
            'user_id' => Usuario::factory(),
            'oferta_id' => OfertaEmpleo::factory(),
            'fecha_postulacion' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'estado' => $this->faker->randomElement(array: ['pendiente', 'rechazado', 'aceptado']),
            'mensaje_adicional' => $this->faker->optional()->sentence(),
        ];
    }
}
