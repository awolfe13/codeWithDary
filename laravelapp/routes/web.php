<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

//forward slash is optional

//Route::resource('blog', PostsController::class);

//Invoke Controller
Route::get('/', HomeController::class);

//Get
Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [PostsController::class, 'show'])->name('blog.show');

//Post
Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/blog', [PostsController::class, 'store'])->name('blog.store');

//Put or Patch
Route::get('/blog/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
Route::patch('/blog/{id}', [PostsController::class, 'update'])->name('blog.update');

//Delete
Route::delete('/blog/1', [PostsController::class, 'destroy'])->name('blog.delete');

/*
//Multiple Http Verbs/Methods - 2 ways
Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
Route::any('/blog', [PostsController::class, 'index']);

//Return View
Route::view('/blog', 'blog.index', ['name' => 'code with ariel']);
*/