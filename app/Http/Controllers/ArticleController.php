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

    public function show(Article $article, Request $request)
    {
        $order = "desc-day";
        if ($request->select != null) {
            $order = $request->select;
        }

        if ($order === "desc-day") {
            $users = Article::find($article->id)->users()
                ->withPivot('created_at AS make_at')
                ->orderBy('make_at', 'desc')
                ->get();
        } elseif ($order === "desc") {
            $users = Article::find($article->id)->users()
                ->withPivot('rate')
                ->orderBy('rate', 'desc')
                ->get();
        } elseif ($order === "asc") {
            $users = Article::find($article->id)->users()
                ->withPivot('rate')
                ->orderBy('rate', 'asc')
                ->get();
        }

        $count = $article->users->count();

        $avg = number_format(ArticleUser::where('article_id', '=', $article->id)->avg("rate"), 2);

        return view(
            'articles.show',
            ['article' => $article, 'users' => $users, 'count' => $count, 'avg' => $avg]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:100',
            'rate' => 'required'
        ]);

        $result = ArticleUser::where('user_id', '=', auth()->id())->where('article_id', '=', $request->id)->first();

        if ($result === null) {
            auth()->user()->articles()->attach([
                $request->id => [
                    'comment' => $request->comment,
                    'rate' => $request->rate
                ]
            ]);


            return back();
        } else {
            auth()->user()->articles()->detach($request->id);

            auth()->user()->articles()->attach([
                $request->id => [
                    'comment' => $request->comment,
                    'rate' => $request->rate
                ]
            ]);

            return back();
        }
    }
}
