<?php

namespace Database\Factories;

use App\Models\Alerte;
use App\Models\Client;
use App\Models\Lieu;
use App\Models\TypeBien;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlerteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alerte::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'montantMin' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'montantMax' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'client_id' => Client::all()->random()->id,
            'type_bien_id' => TypeBien::all()->random()->id,
            'lieu_id' => Lieu::all()->random()->id,
        ];
    }
}
