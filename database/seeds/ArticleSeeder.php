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
                'title' => '【PHP中級】基礎だけ学ぶ PHPプログラミング講座Ⅱ データベースプログラミング編',
                'body' => 'udemyの基礎だけ学ぶPHPプログラミング講座の続編講座。
            前作を学んだ後にこの教材で学習すると、PHPの知識がより深まる。',
                'img' => 'img/php2.png',
                'subject' => 'php',
            ],
        );
    }
}
