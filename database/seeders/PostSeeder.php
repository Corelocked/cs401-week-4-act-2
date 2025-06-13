<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $users = User::all();

        if($users->count() === 0){
            echo "No users found. Please create a user before seeding posts.";
            return;
        }

        Post::factory(10)->create([
            'user_id' => $users->random()->id,
        ]);

        $categories = Category::all();
        $posts = Post::all();

        foreach ($posts as $post) {
            $randomCats = $categories->random(rand(1, 3));
            $post->categories()->attach($randomCats);
        }
    }
}
