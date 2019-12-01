<?php

use App\Clip;
use App\User;
use App\Playlist;
use Illuminate\Database\Seeder;

class ClipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clipsCount = (int)$this->command->ask('How many clips would you like? (Default 100)', 100);

        $users = User::all();
        $playlists = Playlist::all();

        while($clipsCount > 0)
        {
            $user = $users->random();
            $playlist = $playlists->random();

            $playlist->clips()->save(factory(Clip::class)->make([
                'user_id' => $user,
            ]));

            $clipsCount--;
        }
    }
}
