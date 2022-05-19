@extends('app')

@section('title','教材一覧')

@section('content')
@include('nav')

<div class="container">
  <div class="row g-3">
    @foreach($articles as $article)
    <div class="card bg-light">
      <div class="card-body">
        <img class="card-img-top subject" src="{{asset($article->img)}}" alt="教材の画像">
        <h5 class="card-title">{{$article->title}}
        </h5>
        <p class="card-text">
          {{$article->body}}
        </p>
        <a href="/articles/show/{{$article->id}}">詳細表示</a>
      </div>
    </div>
    @endforeach
  </div>
</div>


@endsection
