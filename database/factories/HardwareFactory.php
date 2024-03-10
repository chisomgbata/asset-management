<?php

namespace Database\Factories;

use App\Models\Hardware;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Hardware>
 */
class HardwareFactory extends Factory
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
            'brand' => $this->faker->word,
            'description' => $this->faker->text,
            'purpose' => $this->faker->word,
            'oem_support_end_date' => $this->faker->dateTime(),
            'estimated_renewal_cost' => $this->faker->randomNumber(),
            'status' => $this->faker->word,
            'eol_date' => $this->faker->dateTime(),
            'oem_renewal' => $this->faker->word,

            //
        ];
    }
}
