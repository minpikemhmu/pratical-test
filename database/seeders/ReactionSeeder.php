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

        foreach (range(3, 17) as $index) {
            Reaction::create([
                'post_id' => $postIds[array_rand($postIds)],
                'user_id' => $userIds[array_rand($userIds)],
            ]);
        }
    }
}
