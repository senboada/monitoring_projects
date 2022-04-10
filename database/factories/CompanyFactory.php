<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Http\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'nit' => $this->faker->numberBetween($min = 900000, $max = 1000000),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->streetAddress,
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
