<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title'=>'test1',
            'body'=>'HelloWorld!'
        ]);
        Article::create([
            'title' => 'test2',
            'body' => 'こんにちは！'
        ]);
    }
}
