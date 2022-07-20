<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

/*
Get - request a resource
Post - Create new resource (new row in db)
Put - update a resource
Patch - modify a resource (single values)
Delete - delete a resource (row)
Options - Ask server which verbs are allowed at uri
*/

//forward slash is optional

//Route::resource('blog', PostsController::class);

//Invoke Controller
Route::get('/', HomeController::class);

//Get
Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/{id}', [PostsController::class, 'show'])->where('id', '[0-9]+');
Route::get('/blog/{name}', [PostsController::class, 'show'])->where('name', '[A-Za-z]+');
Route::get('/blog/{id}/{name}', [PostsController::class, 'show'])
  ->where([
    'id' => '[0-9]+',
    'name' => '[A-Za-z]+'
  ]);
  
Route::get('/blog/{id}', [PostsController::class, 'show'])->whereNumber('id');
Route::get('/blog/{name}', [PostsController::class, 'show'])->whereAlpha('name');

Route::get('/blog/{id}/{name}', [PostsController::class, 'show'])
  ->whereNumber('id')
  ->whereAlpha('name');

//Post
Route::get('/blog/create', [PostsController::class, 'create']);
Route::post('/blog', [PostsController::class, 'store']);

//Put or Patch
Route::get('/blog/edit/{id}', [PostsController::class, 'edit']);
Route::patch('/blog/{id}', [PostsController::class, 'update']);

//Delete
Route::delete('/blog/1', [PostsController::class, 'destroy']);

/*
//Multiple Http Verbs/Methods - 2 ways
Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
Route::any('/blog', [PostsController::class, 'index']);

//Return View
Route::view('/blog', 'blog.index', ['name' => 'code with ariel']);
*/