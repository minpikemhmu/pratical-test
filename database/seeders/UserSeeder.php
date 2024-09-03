<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password!%A'),
        ]);
        User::create([
            'name' => 'minpike',
            'email' => 'minpikehmu10@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

        $faker = Faker::create();

        foreach (range(1, 15) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), // Use a default password
            ]);
        }
    }
}
