<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;
use Faker\Provider\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create();


        return [
            'name' => $faker->name(),
            'country' => $faker->country(),
            'number' => $faker->numberBetween(15, 40),
            'image' => $faker->image(public_path('storage/Player'), 400, 400, 'sports', false),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
