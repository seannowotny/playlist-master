<?php

use App\User;
use App\Comment;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commentsCount = (int)$this->command->ask('How many comments would you like? (Default 25)', 25);

        $users = User::all();

        while($commentsCount > 0)
        {
            $users->each(function(User $user) use (&$commentsCount)
            {
                if($commentsCount > 0)
                {  
                    $playlist = $user->myPlaylists->random();
                    $playlist->comments()->save(factory(Comment::class)->make([
                        'user_id' => $user,
                        'playlist_id' => $playlist
                    ]));
                    $commentsCount--;
                }
            });
        }
    }
}
