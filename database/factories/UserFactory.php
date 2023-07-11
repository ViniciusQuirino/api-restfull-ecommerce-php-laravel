<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('Vinicius12'),
            'age' => $this->faker->numberBetween(18, 65),
            'cpf' => $this->faker->numerify('###########'),
            'type' => $this->faker->randomElement(['administrador', 'cliente', 'vendedor']),
        ];
    }
}
