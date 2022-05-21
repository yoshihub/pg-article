<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\ArticleUser;
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

    public function store(Request $request)
    {
        $result = ArticleUser::where('user_id', '=', auth()->id())->where('article_id', '=', $request->id)->first();

        if ($result === null) {
            auth()->user()->articles()->attach([
                $request->id => ['comment' => $request->comment]
            ]);
            return back();
        } else {
            auth()->user()->articles()->detach($request->id);

            auth()->user()->articles()->attach([
                $request->id => ['comment' => $request->comment]
            ]);
            return back();
        }
    }
}
