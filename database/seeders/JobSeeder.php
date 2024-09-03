<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create([
            'title' => 'Software Engineer',
            'description' => 'Responsible for developing and maintaining software applications.',
            'location' => 'Tokyo, Japan',
            'salary' => 6000.00,
            'type' => 'full-time',
        ]);

        Job::create([
            'title' => 'Project Manager',
            'description' => 'Manage software development projects from initiation to closure.',
            'location' => 'Kyoto, Japan',
            'salary' => 8000.00,
            'type' => 'full-time',
        ]);

        Job::create([
            'title' => 'Data Analyst',
            'description' => 'Analyze data and provide insights for business decision-making.',
            'location' => 'Osaka, Japan',
            'salary' => 5000.00,
            'type' => 'contract',
        ]);
    }
}
