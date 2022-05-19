@extends('app')

@section('title','プログラミング教材')

@section('content')
@include('nav')

<form method="POST" action="/articles/link">
  @csrf
  <input type="hidden" name="subject" value="php">
  <button type="submit">PHPの教材</button>
</form>

<form method="POST" action="/articles/link">
  @csrf
  <input type="hidden" name="subject" value="bootstrap">
  <button type="submit">Bootstrapの教材</button>
</form>







@endsection
