<?php

namespace Database\Factories;

use App\Models\Workstation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Workstation>
 */
class WorkstationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location' => $this->faker->word,
            'network_id' => $this->faker->word,
            'proponent' => $this->faker->word,
            'division' => $this->faker->word,
            'used_by' => $this->faker->word,
            'status' => $this->faker->word,
            'sa_physical_id' => $this->faker->word,
            'serial_no' => $this->faker->word,
            'image' => $this->faker->imageUrl,
            'model' => $this->faker->word,
            'ip_address' => $this->faker->word,
            'mac_address' => $this->faker->word,

        ];
    }
}
