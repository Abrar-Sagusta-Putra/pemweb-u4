<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'abrar@gmail.com'],
            [
                'name' => 'Abrar',
                'password' => 'password',
            ]
        );

        Article::factory(12)->for($user)->create();
    }
}