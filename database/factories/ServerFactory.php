<?php

namespace Database\Factories;

use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'host_name' => $this->faker->word,
            'ip_address' => $this->faker->ipv4,
            'description' => $this->faker->text,
            'owner' => $this->faker->name,
        ];
    }
}
