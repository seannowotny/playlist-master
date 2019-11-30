<?php

use App\User;
use App\Playlist;
use Illuminate\Database\Seeder;

class PlaylistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playlistsCount = (int)$this->command->ask('How many playlists would you like? (Default 10)', 10);

        $users = User::all();

        while($playlistsCount > 0)
        {
            $users->each(function(User $user) use (&$playlistsCount)
            {
                if($playlistsCount > 0)
                {
                    $user->playlists()->save(factory(Playlist::class)->make([
                        'user_id' => $user,
                    ]));
                    $playlistsCount--;
                }
            });
        }
    }
}
