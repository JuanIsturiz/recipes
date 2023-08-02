<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Recipe::create([
            'user_id' => $user->id,
            'name' => 'mac n cheese',
            'tags' => 'tasty, fast',
            'dificulty' => 'beginner',
            'ingredients' => 'pasta, cheese, heavy cream, milk, butter, seasonings',
            'steps' => 'cook the pasta, add butter, add milk and cheese, add heavy cream, mix all up until the cheese melts completely, add seasonings, serve and eat!',
            'time' => '20 minutes',
            'description' => 'easy recipe for dinner or lunch'
        ]);
    }
}
