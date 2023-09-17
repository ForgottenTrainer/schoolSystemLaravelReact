<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'carrera' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'imagen' => null ,
            'direccion' => fake()->address(),
            'telefono' => fake()->phoneNumber(),
            'edad' => fake()->numberBetween(18, 25),
            'cuatrimestre' => fake()->numberBetween(1, 9),
            'genero' => fake()->randomElement(['masculino', 'femenino']),
        ];
    }
}
