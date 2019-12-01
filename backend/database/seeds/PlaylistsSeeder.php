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

        $users->each(function(User $user) use (&$playlistsCount)
        {
            if($playlistsCount > 0)
            {
                $playlists = Playlist::all();

                $playlist = $user->myPlaylists()->save(factory(Playlist::class)->make());

                if($playlists->count() > 0)
                    $playlist->myPlaylists()->save($playlists->random());

                $playlistsCount = $playlistsCount - 2;
            }
        });
    }
}
