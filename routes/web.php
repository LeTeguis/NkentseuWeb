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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
})->middleware('auth');

// test
Route::get('test', function () {
    return 'Vue de test';
})->middleware(['verified']);

Route::get('test', function () {
    return 'Vue de test';
})->middleware(['auth', 'password.confirm']);


// Users
Route::group(['prefix'=> 'users', 'namespace'=>'\App\Http\Controllers'], function() {
    Route::get('index', ['uses' => 'UserController@index']);
    Route::get('create', ['uses' => 'UserController@create']);
    Route::post('store', ['uses' => 'UserController@store']);
    Route::get('show', ['uses' => 'UserController@show']);
    Route::get('edit', ['uses' => 'UserController@edit']);
    Route::post('update', ['uses' => 'UserController@update']);
    Route::get('delete', ['uses' => 'UserController@delete']);
});

// Posts
Route::group(['prefix'=> 'posts', 'namespace'=>'\App\Http\Controllers'], function() {
    Route::get('index', ['uses' => 'PostController@index']);
    Route::get('create', ['uses' => 'PostController@create'])->name('posts_create');
    Route::post('store', ['uses' => 'PostController@store'])->name('posts_store');
    Route::get('show', ['uses' => 'PostController@show'])->name('posts_show');
    Route::get('edit', ['uses' => 'PostController@edit'])->name('posts_edit');
    Route::post('update', ['uses' => 'PostController@update'])->name('posts_update');
    Route::get('delete', ['uses' => 'PostController@delete'])->name('posts_destroy');
});
