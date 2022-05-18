@extends('app')

@section('title','PHP教材')

@section('content')
@include('nav')

<div class="container">
  <div class="row">
    <div class="card g-light">
      <div class="card-body">
        <img class="card-img-top udemy" src="{{asset($article->img)}}" alt="Card image cap">
        <h5 class="card-title">{{$article->title}}
        </h5>
        <p class="card-text">
          {{$article->body}}
        </p>
        <form method="POST" action="{{route('articles.store',$article->id)}}">
          @csrf
          <textarea type="text" name="comment" cols="30" rows="3"></textarea>
          <button type="submit">口コミ投稿</button>
        </form>
      </div>
    </div>
  </div>

  <div>
    <h3>口コミ一覧</h3>
    @foreach($article->users as $user)
    <div class="card">
      <p class="card-title">ユーザー名：{{$user->name}}</p>
      <p class="card-text">コメント：{{$user->pivot->comment}}</p>
    </div>
    @endforeach
  </div>
</div>

@endsection
