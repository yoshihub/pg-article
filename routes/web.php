<?php


Route::get('/', 'ArticleController@index')->name('articles.index');

Route::post('/articles/link', 'ArticleController@link')->name('articles.link');

Route::get('/articles/show/{article}', 'ArticleController@show')->name('articles.show');

Route::group(['middleware' => 'auth'], function () {
  Route::post('/articles/store', 'ArticleController@store')->name('articles.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
