<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }

    public function link(Request $request)
    {
        $articles = Article::where('subject', '=', $request->subject)->get();
        return view('articles.subject', ['articles' => $articles]);
    }

    public function show(Article $article)
    {

        return view('articles.show', ['article' => $article]);
    }

    public function store(Request $request, Article $article)
    {

        auth()->user()->articles()->attach($article->id, ['comment' => $request->comment]);
        return back();
    }
}
