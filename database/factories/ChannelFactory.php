<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Channel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // when using tinker to populated DB don't forget to 'use App\Models\Channel;'
        // this allows you to make the call Channel::factory()->count(20)->create();
        
        return [
            'name' => fake()->word(),
        ];
    }
}
