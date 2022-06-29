@extends('app')

@section('title','教材一覧')

@section('content')
@include('nav')

<div class="container">
  <div class="row g-2">
    @foreach($articles as $article)
    <div class="card bg-light mb-1 shadow-sm">
      <div class="card-body row">
        <img class="img-fluid col-sm-12 col-md-9 col-lg-5" src="{{asset($article->img)}}" alt="教材の画像">
        <div class="col-lg-7">
          <h5 class="card-title fs-4 mt-2">{{$article->title}}
          </h5>
          <p class="card-text">
            {{$article->body}}
          </p>
          <a class="btn btn-primary col-3" href="/articles/show/
          {{$article->id}}">詳細表示</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


@endsection
