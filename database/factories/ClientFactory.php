<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
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
            'address'           => $this->faker->address,
            'phone'             => $this->faker->e164PhoneNumber,
        ];
    }
}
