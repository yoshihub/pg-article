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
                'title' => 'スラスラわかるJavaScript',
                'body' => 'この本はJavascriptの本だが、前半部分の内容はhtmlです。htmlからjavascriptまで一気に学びたい方はこの本がおすすめ。',
                'img' => 'img/html2.png',
                'subject' => 'html',
            ],
        );
    }
}
