<?php

namespace Database\Factories;

use App\Models\Bien;
use App\Models\Commodite;
use App\Models\CommoditeBien;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommoditeBienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommoditeBien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'commodite_id' => Commodite::all()->random()->id,
            'bien_id' => Bien::all()->random()->id,
            'nombre' => $this->faker->numberBetween($min = 0, $max = 5),
        ];
    }
}
