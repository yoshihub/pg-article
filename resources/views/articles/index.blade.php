@extends('app')

@section('title','プログラミング教材')

@section('content')
@include('nav')

<form method="POST" action="/articles/link">
  @csrf
  <input type="hidden" name="subject" value="php">
  <button>PHPの教材</button>
</form>








@endsection
