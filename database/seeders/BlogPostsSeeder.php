<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

class BlogPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin',
            ]);
        }
        
        $categoryId = Category::first()?->id;
        if (!$categoryId) {
            $category = Category::create([
                'name_en' => 'General',
                'name_bn' => 'সাধারণ',
                'slug' => 'general',
            ]);
            $categoryId = $category->id;
        }

        $posts = [
        ];

        foreach ($posts as $postData) {
            // Check if slug exists to avoid unique constraint violation
            if (Post::where('slug', $postData['slug'])->exists()) {
                continue;
            }

            Post::create([
                'user_id' => $user->id,
                'category_id' => $categoryId,
                'title_en' => $postData['title_en'],
                'title_bn' => $postData['title_bn'],
                'slug' => $postData['slug'],
                'body_en' => $postData['body_en'],
                'body_bn' => $postData['body_bn'],
                'status' => $postData['status'],
                'created_at' => $postData['created_at'],
                'updated_at' => $postData['created_at'], // Set updated_at same as created_at
            ]);
        }
    }
}
