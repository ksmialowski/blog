<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Kamil Śmiałowski'
        ]);

        $post = Post::factory(10)->create();

        Comment::factory(5)->create([
            'post_id' => 1,
            'user_id' => $user->id
        ]);
    }
}
