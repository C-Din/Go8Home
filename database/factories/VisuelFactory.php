<?php

namespace Database\Factories;

use App\Models\Bien;
use App\Models\Visuel;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisuelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visuel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bien_id' => Bien::all()->random()->id,
            'urlVisuel' => $this->faker->imageUrl($width = 640, $height = 480),
            'typeVisuel' => $this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}
