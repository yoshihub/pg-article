<?php


Route::get('/', 'ArticleController@index')->name('articles.index');

Route::post('/articles/link', 'ArticleController@link')->name('articles.link');



Route::get('/articles/show/{article}', 'ArticleController@show')->name('articles.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/articles/store/{article}', 'ArticleController@store')->name('articles.store');
