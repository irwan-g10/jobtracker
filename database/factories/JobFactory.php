<?php

namespace Database\Factories;

use App\Models\JobPosition;
use App\Models\JobResource;
use App\Models\JobStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'company_name' => fake()->company(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'province' => fake()->state(),
            'postal_code' => fake()->postcode(),
            'job_position_id' => JobPosition::inRandomOrder()->value('id') ,
            'job_status_id' => JobStatus::inRandomOrder()->value('id'),
            'job_resource_id' => JobResource::inRandomOrder()->value('id'),
            'created_at' => fake()->dateTimeBetween('-2 years', 'now'),
            'updated_at' => fake()->dateTimeBetween('created_at', 'now'),
        ];
    }
}
