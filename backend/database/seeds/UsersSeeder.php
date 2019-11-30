<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = (int)$this->command->ask('How many users would you like? (Default 4)', 4);

        factory(User::class, $usersCount)->create();
    }
}
