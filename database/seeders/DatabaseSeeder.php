<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Paycomet\Backoffice\User\Infrastructure\Repositories\Models\User;
use Paycomet\Backoffice\Courses\Infrastructure\Repositories\Models\Course;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->create([
           'name' => 'Test User',
           'email' => 'test@example.com',
        ]);

        Course::factory()->count(5)->create();


    }
}
