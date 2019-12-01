<?php

use App\Clip;
use App\Comment;
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
        $likesCount = (int)$this->command->ask('How many likes would you like? (Default 10000)', 1000);

        while($likesCount > 0)
        {
            $user = User::all()->random();
            $choiceNo = rand(0, 2);

            switch ($choiceNo) {
                case 0:
                    if(($playlists = Playlist::all())->count() > 0)
                    {
                        $playlist = $playlists->random();
                        $playlist->likes()->save(factory(Like::class)->make([
                            'user_id' => $user,
                        ]));
                    }
                    break;
                case 1:
                    if(($comments = Comment::all())->count() > 0)
                    {
                        $comment = $comments->random();
                        $comment->likes()->save(factory(Like::class)->make([
                            'user_id' => $user,
                        ]));
                    }
                    break;
                case 2:
                    if(($clips = Clip::all())->count() > 0)
                    {
                        $clip = $clips->random();
                        $clip->likes()->save(factory(Like::class)->make([
                            'user_id' => $user
                        ]));
                    }
                    break;
            }           

            $likesCount--;
        }
    }
}
