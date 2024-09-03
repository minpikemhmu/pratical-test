<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 15) as $index) {
            Post::create([
                'user_id' => rand(3, 17), // Assuming users with IDs from 1 to 15
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
            ]);
        }
    }
}
