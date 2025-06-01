<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company(),
            'descripcion' => $this->faker->paragraph(),
            'industria' => $this->faker->randomElement(['Tecnología', 'Salud', 'Finanzas', 'Educación', 'Manufactura']),
            'sitio_web' => $this->faker->url(),
            'logo_url' => $this->faker->imageUrl(200, 200, 'business', true, 'logo'),
        ];
    }
}
