<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Workstation;
use Database\Factories\HardwareFactory;
use Database\Factories\ServerFactory;
use Database\Factories\SoftwareFactory;
use Database\Factories\TelephoneFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'password',
        ]);

        Workstation::factory()->count(10)->create();
        TelephoneFactory::new()->count(10)->create();
        HardwareFactory::new()->count(10)->create();
        SoftwareFactory::new()->count(10)->create();
        ServerFactory::new()->count(10)->create();

    }
}
