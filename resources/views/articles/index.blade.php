@extends('app')

@section('title','プログラミング教材')

@section('content')
@include('nav')

<div class="container">
  <div class="row mt-3 justify-content-start g-3">

    <div class="col-sm">
      <form method="POST" action="/articles/link">
        @csrf
        <input type="hidden" name="subject" value="php">
        <button type="submit">
          <div>
            <img class="pgLink" src="{{asset('img/php.png')}}" alt="phpの画像">
            <p class="h5 text-center mt-2">PHPの教材一覧</p>
          </div>
        </button>
      </form>
    </div>

    <div class="col-sm">
      <form method="POST" action="/articles/link">
        @csrf
        <input type="hidden" name="subject" value="bootstrap">
        <button type="submit">
          <div>
            <img class="pgLink" src="{{asset('img/boot.png')}}" alt="bootstrapの画像">
            <p class="h5 text-center mt-2">Bootstrapの教材一覧</p>
          </div>
        </button>
      </form>
    </div>

    <div class="col-sm">
      <form method="POST" action="/articles/link">
        @csrf
        <input type="hidden" name="subject" value="html">
        <button type="submit">
          <div>
            <img class="text-center pgLink" src="{{asset('img/html.png')}}" alt="bootstrapの画像">
            <p class="h5 text-center mt-2">HTML/CSSの教材一覧</p>
          </div>
        </button>
      </form>
    </div>

  </div>
</div>
@endsection
