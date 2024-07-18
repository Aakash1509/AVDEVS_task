<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;

Route::get('/blogs', 'App\Http\Controllers\BlogController@show');

Route::get('/blogsuser', 'App\Http\Controllers\BlogController@showuser');

Route::get('/blogs/add', 'App\Http\Controllers\BlogController@addBlog');
Route::post('/blogs/add', 'App\Http\Controllers\BlogController@saveBlog');
Route::get('/blogs/edit/{id}', 'App\Http\Controllers\BlogController@editBlog');
Route::post('/blogs/edit/{id}', 'App\Http\Controllers\BlogController@updateBlog');
Route::get('/blogs/delete/{id}','App\Http\Controllers\BlogController@deleteBlog');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('login',[AuthController::class,'index'])->name('login');
// Route::get('register',[AuthController::class,'register_view'])->name('register');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
