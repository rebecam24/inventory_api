<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name,
            'lastname'          => $this->faker->name,
            'id_number'         => $this->faker->randomNumber(8),
            'phone'             => $this->faker->e164PhoneNumber,
            'address'           => $this->faker->address,
            'email'             => $this->faker->unique()->safeEmail,
        ];
    }
}
