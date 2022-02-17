<?php

namespace Database\Factories;

use App\Models\Commodite;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommoditeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commodite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomCom' => $this->faker->text(10),
            'iconCom' => $this->faker->imageUrl(150, 150),
        ];
    }
}
