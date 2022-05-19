<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create(
            [
                'title' => 'Bootstrap4 基礎講座',
                'body' => 'udemyのベストセラー講座。',
                'img' => 'img/boot2.png',
                'subject' => 'bootstrap',
            ],
        );
    }
}
