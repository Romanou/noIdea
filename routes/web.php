<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','General@index');
Route::get('/song/{id}','General@song')->where('id','[0-9]+');
Route::get('user/{id}','General@user')->where('id','[0-9]+');

//Nouveau commentaire
Route::post('/comment/store/{id}','General@StoreComment')->where('id','[0-9]+')->middleware("auth");


//upload

Route::get('/song/new','General@NewSong')->middleware("auth");

Route::post('/song/store','General@StoreSong')->middleware("auth");
Route::post('/song/like','General@LikeSong')->middleware("auth");
Route::post('/song/unlike','General@UnlikeSong')->middleware("auth");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','General@logout')->middleware("auth");

//Search
Route::get('/search','General@search');
