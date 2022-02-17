<?php

namespace Database\Factories;

use App\Models\Lieu;
use Illuminate\Database\Eloquent\Factories\Factory;

class LieuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lieu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'region' => $this->faker->state,
            'ville' => $this->faker->city,
            'quartier' => $this->faker->streetName,
            'bp' => $this->faker->numberBetween($min = 1000, $max = 9999),
        ];
    }
}
