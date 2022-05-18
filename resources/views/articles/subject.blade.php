@extends('app')

@section('title','PHP教材')

@section('content')
@include('nav')

<div class="container">
  <div class="row g-3">
    @foreach($articles as $article)
    <div class="card bg-light">
      <div class="card-body">
        <img class="card-img-top udemy" src="{{asset($article->img)}}" alt="Card image cap">
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
