<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(10)
            ->has(Post::factory()->withTags()->count(20)) // per ogni categoria creata, verranno associati 20 post. Il metodo `withTags()` (definito nella factory di `Post`) aggiunge dei tag a ciascun post.
            ->create();
    }
}
