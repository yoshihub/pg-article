@component('mail::message')

ユーザー登録ありがとうございます　

{{$user->name}}さんこんにちは。
{{$user->email}}で登録されました。

@component('mail::button',['url'=>route('articles.index')])
口コミを見に行く
@endcomponent

@endcomponent
