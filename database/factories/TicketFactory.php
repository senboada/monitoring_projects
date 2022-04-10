<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserHistory;
use App\Models\User;
use App\Models\Ticket;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cod_user_history' => $this->faker->randomElement(UserHistory::pluck('id')),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'created_by' => $this->faker->randomElement(User::pluck('id')),
        ];
    }
}
