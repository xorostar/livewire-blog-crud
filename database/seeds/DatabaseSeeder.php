<?php

use App\User;
use App\Post;
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
        // $this->call(UserSeeder::class);

        // factory(User::class, 1)->create()->each(function ($user) {
        //     $user->posts()->factory(Post::class)->create();
        // });
        $user = factory(User::class)->create();
        $posts = factory(Post::class, 500)->create();
    }
}
