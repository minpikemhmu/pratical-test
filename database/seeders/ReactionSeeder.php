<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reaction;
use App\Models\Post;
use App\Models\User;

class ReactionSeeder extends Seeder
{
    public function run()
    {
        $postIds = Post::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        foreach (range(1, 15) as $index) {
            $postId = $postIds[array_rand($postIds)];
            $userId = $userIds[array_rand($userIds)];

            $reactionExists = Reaction::where('post_id', $postId)
                                      ->where('user_id', $userId)
                                      ->exists();

            if (!$reactionExists) {
                Reaction::create([
                    'post_id' => $postId,
                    'user_id' => $userId,
                ]);
            }
        }
    }
}
