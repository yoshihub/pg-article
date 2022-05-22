@extends('app')

@section('title','教材詳細')

@section('content')
@include('nav')

<div class="container">
  <div class="row">
    <div class="card bg-light mt-2">
      <div class="card-body">
        <img class="card-img-top subject" src="{{asset($article->img)}}" alt="教材の画像">
        <h5 class="card-title fs-4 mt-2">{{$article->title}}
        </h5>
        <p class="card-text">
          {{$article->body}}
        </p>

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form method="POST" action="{{route('articles.store')}}">
          @csrf
          <textarea class="form-control border border-info border-1" type="text" name="comment" cols="30" rows="3"></textarea>
          <input type="hidden" name="id" value="{{$article->id}}">
          <button class="btn btn-success mt-2" type="submit">口コミ投稿</button>
        </form>
      </div>
    </div>
  </div>

  <div>
    <h3>口コミ一覧</h3>
    @foreach($users as $user)

    <div class="card">
      <p class="card-title">{{$user->name}}さん</p>
      <p class="card-text">{{$user->pivot->comment}}</p>
      <p class="card-text">投稿日：{{$user->pivot->updated_at}}</p>
    </div>
    @endforeach
  </div>

  @endsection
