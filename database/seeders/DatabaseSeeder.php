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
            'name' => 'Test',
            'username' => 'Test',
            'email' => 'test@test.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => "test",
            'isAdmin' => 1,
            'remember_token' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

        $post = Post::factory(10)->create();

        Comment::factory(5)->create([
            'post_id' => 1,
            'user_id' => $user->id
        ]);
    }
}
