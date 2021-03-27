<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/","WelcomeController@index");
Route::get("/article","ArticleController@index");
Route::post("/article","ArticleController@create");
Route::get("/post/details/{id}","DetailsController@index");
Route::post("/details", "DetailsController@create");

Route::get("/comment","CommentController@index");
Route::post("/comment","CommentController@create");
