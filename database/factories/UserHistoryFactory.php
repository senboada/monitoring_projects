<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\User;
use App\Models\UserHistory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserHistory>
 */
class UserHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cod_project' => $this->faker->randomElement(Project::pluck('id')),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'created_by' => $this->faker->randomElement(User::pluck('id')),
        ];
    }
}
