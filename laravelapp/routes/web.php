<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

//forward slash is optional

//Route::resource('blog', PostsController::class);

//Invoke Controller
Route::get('/', HomeController::class);

//keep / if its the same as prefix
//otherwise first / can be removed if more following prefix
Route::prefix('/blog')->group(function () {
  //ex this get is '/blog' so blog removed but first / stays
Route::get('/', [PostsController::class, 'index'])->name('blog.index');
Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');
Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/', [PostsController::class, 'store'])->name('blog.store');
Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');
Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.delete');
});

/*
//Multiple Http Verbs/Methods - 2 ways
Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
Route::any('/blog', [PostsController::class, 'index']);

//Return View
Route::view('/blog', 'blog.index', ['name' => 'code with ariel']);
*/