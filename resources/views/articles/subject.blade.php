@extends('app')

@section('title','教材一覧')

@section('content')
@include('nav')

<div class="container">
  <div class="row g-2">
    @foreach($articles as $article)
    <div class="card bg-light mt-2">
      <div class="card-body row">
        <img class="card-img-top subject" src="{{asset($article->img)}}" alt="教材の画像">
        <h5 class="card-title fs-4">{{$article->title}}
        </h5>
        <p class="card-text">
          {{$article->body}}
        </p>
        <a class="btn btn-primary col-3" href="/articles/show/{{$article->id}}">詳細表示</a>
      </div>
    </div>
    @endforeach
  </div>
</div>


@endsection
