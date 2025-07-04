<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;
use App\Models\Tag;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement([20000, 50000, 100000, 80000]),
            'location' => 'remote',
            'schedule' => 'full_time',
            'url' => fake()->url(),
            'featured' => fake()->boolean(),
            'employer_id' => Employer::factory(),
        ];
    }
}
