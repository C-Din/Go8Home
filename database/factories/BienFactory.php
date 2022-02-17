<?php

namespace Database\Factories;

use App\Models\Bien;
use App\Models\Lieu;
use App\Models\TypeBien;
use Illuminate\Database\Eloquent\Factories\Factory;

class BienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_bien_id' => TypeBien::all()->random()->id,
            'lieu_id' => Lieu::all()->random()->id,
            'nombreChambre' => $this->faker->numberBetween($min = 2, $max = 5),
            'superficie' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'image' => $this->faker->imageUrl(150, 150),
            'montant' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'etage' => $this->faker->numberBetween($min = 0, $max = 5),
            'typeAchat' => $this->faker->numberBetween($min = 0, $max = 2),
            'description' => $this->faker->text(500),
            'nombreEtage' => $this->faker->numberBetween($min = 0, $max = 5),
        ];
    }
}
