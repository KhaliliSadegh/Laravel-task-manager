<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // e.g., "Fix server response issue"
            'priority' => $this->faker->numberBetween(1, 10),
            'project_id' => Project::factory(), // automatically links to a new project
        ];
    }
}
