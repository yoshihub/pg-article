@extends('app')

@section('title','教材詳細')

@section('content')
@include('nav')

<div class="container">
  <div class="card bg-light mb-1 shadow-sm">
    <div class="card-body row">
      <img class="img-fluid col-sm-12 col-md-8 col-lg-5" src="{{asset($article->img)}}" alt="教材の画像">
      <div class="col-lg-7">
        <h5 class="card-title fs-4 mt-2">{{$article->title}}
        </h5>
        <p class="card-text">
          {{$article->body}}<br>
          <span class="fs-6 mt-1">
            <i class="bi bi-chat-left-dots-fill text-success font-weight-bolder">
            </i>{{$count}}件
          </span>
          <span class="fs-6 mt-1">
            <i class="bi bi-star-fill text-warning ms-2"></i>
            レビュー {{$avg}}
          </span>
        </p>
      </div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @auth
      <form id="createForm" class="form-group mt-2 col-sm-12 col-md-8 col-lg-7" method="POST" action="{{route('articles.store')}}">
        @csrf
        <textarea class="form-control border border-info border-1" type="text" name="comment" cols="30" rows="3"></textarea>
        <div class="rate-form">
          <input id="star5" type="radio" name="rate" value="5">
          <label for="star5">★</label>
          <input id="star4" type="radio" name="rate" value="4">
          <label for="star4">★</label>
          <input id="star3" type="radio" name="rate" value="3">
          <label for="star3">★</label>
          <input id="star2" type="radio" name="rate" value="2">
          <label for="star2">★</label>
          <input id="star1" type="radio" name="rate" value="1">
          <label for="star1">★</label>
        </div>
        <input type="hidden" name="id" value="{{$article->id}}">
        <button id="createButton" class="btn btn-success mt-2" type="submit">口コミ投稿</button>
      </form>
      @endauth
    </div>
  </div>


  <div>
    <h3>
      口コミ一覧
      <form class="d-inline-block ms-2" method="get" action="/articles/show/{{$article->id}}">
        @csrf
        <select name="select">
          <option value="desc-day">新しい順</option>
          <option value="desc">評価の高い順</option>
          <option value="asc">評価の低い順</option>
        </select>
        <button type="submit">並べ替え</button>
      </form>
    </h3>
    @foreach($users as $user)

    <div class="card">
      <p class="card-title">{{$user->name}}さん
        <span class="ms-2">@for ($i = 0; $i < $user->pivot->rate; $i++) <i class="bi bi-star-fill text-warning"></i> @endfor</span>
      </p>

      <p class="card-text">{{$user->pivot->comment}}</p>
      <p class="card-text">投稿日：{{$user->pivot->updated_at}}</p>
    </div>
    @endforeach
  </div>
</div>
@endsection
