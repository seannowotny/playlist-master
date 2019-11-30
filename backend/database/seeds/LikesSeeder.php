<?php

use App\Like;
use App\User;
use App\Playlist;
use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likesCount = (int)$this->command->ask('How many likes would you like? (Default 25)', 25);

        while($likesCount > 0)
        {
            $user = User::all()->random();
            $playlist = Playlist::all()->random();

            $playlist->likes()->save(factory(Like::class)->make([
                'user_id' => $user,
                'playlist_id' => Playlist::all()->random(),
            ]));

            $likesCount--;
        }
    }
}
