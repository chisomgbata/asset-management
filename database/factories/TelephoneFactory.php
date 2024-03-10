<?php

namespace Database\Factories;

use App\Models\Telephone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Telephone>
 */
class TelephoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'model' => $this->faker->word,
            'serial_number' => $this->faker->word,
            'ext' => $this->faker->word,
            'user' => $this->faker->word,
            'location' => $this->faker->word,

        ];
    }
}
