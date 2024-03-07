<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Miembro>
 */
class MiembroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      /*
      // factory y seeder
        return [
            'nombre_apellido'=> Str::random(100),
            'direccion'=> Str::random(50),
            'telefono' => random_int(1000000,1500000),
            'fecha_nacimiento' => '2020-12-15',
            'genero' => 'MASCULINO',
            'email' => Str::random(10).'@gmail.com',
            'estado' => '1',
            'ministerio' => 'PASTORAL',
            'fotografia' => 'foto.jpg',
            'fecha_ingreso' => '2024-02-19',
        ];
      */
        return [
            'nombre_apellido'=> fake()->name,
            'direccion'=> fake()->address,
            'telefono' => random_int(1000000,1500000),
            'fecha_nacimiento' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'genero' => 'MASCULINO',
            'email' => fake()->unique()->safeEmail(),
            'estado' => '1',
            'ministerio' => 'PASTORAL',
            'fotografia' => 'foto.jpg',
            'fecha_ingreso' => fake()->date($format = 'Y-m-d'),
        ];
    }
}
