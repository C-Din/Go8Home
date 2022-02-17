<?php

namespace Database\Factories;

use App\Models\Bien;
use App\Models\Client;
use App\Models\Favori;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Favori::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::all()->random()->id,
            'bien_id' => Bien::all()->random()->id,
            'etat' => $this->faker->numberBetween($min = 0, $max =1),
        ];
    }
}
