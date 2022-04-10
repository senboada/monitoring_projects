<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::factory(10)->create();
        \App\Models\User::factory(100)->create();
        \App\Models\Project::factory(100)->create();
        \App\Models\UserHistory::factory(200)->create();
        \App\Models\Ticket::factory(300)->create();
    }
}
