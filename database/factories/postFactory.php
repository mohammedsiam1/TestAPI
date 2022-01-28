<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titel' => $this->faker->sentence(5),
            'body' => $this->faker->paragraph(4),


        ];
    }
}
