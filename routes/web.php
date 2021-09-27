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

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

Route::get('/home', 'ArticleController@index')->name('home');

Route::resource('articles', ArticleController::class);

Route::get('/', function () {
    return redirect()->route('login');//dopo il logout fai la redirect sulla rotta login.
});

Route::get('/tags/{tag}', 'TagsController@show')->name('tag-show');//crei la rotta per mostrare ogni singolo tag a quanti articoli è collegato