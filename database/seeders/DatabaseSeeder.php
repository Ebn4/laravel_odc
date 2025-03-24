<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Article::factory(50)->create();
        // User::factory(50)->create();
        // Category::factory(10)->create();
        Comment::factory(100)->create();


        // $article = Article::find(2);
        // $article->categories()->attach([2,2,10]);

        // $article->categories()->attach([2,4]);



        // $categorie = Category::find(2);
        // echo $article;

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
