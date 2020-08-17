<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PostController@index') -> name("posts");
Route::post('/destroy/{id}', 'PostController@destroy') -> name("destroy");
Route::post('/update/{id}', 'PostController@update') -> name("update");
