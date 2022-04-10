<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\User;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cod_company' => $this->faker->randomElement(Company::pluck('id')),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'created_by' => $this->faker->randomElement(User::pluck('id')),
        ];
    }
}
