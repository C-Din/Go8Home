<?php

namespace Database\Factories;

use App\Models\TypeBien;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeBienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeBien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomTypeBien' => $this->faker->text(20),
        ];
    }
}
