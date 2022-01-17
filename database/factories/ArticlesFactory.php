<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>ucfirst($this->faker->unique()->words(5,true)),
            'descripcion'=>ucfirst($this->faker->text())
        ];
    }
}
