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
Route::get('/blog/1', [PostsController::class, 'show']);

//Post
Route::get('/blog/create', [PostsController::class, 'create']);
Route::post('/blog', [PostsController::class, 'store']);

//Put or Patch
Route::get('/blog/edit/1', [PostsController::class, 'edit']);
Route::patch('/blog/1', [PostsController::class, 'update']);

//Delete
Route::delete('/blog/1', [PostsController::class, 'destroy']);

//Multiple Http Verbs/Methods - 2 ways

//accepts 3 params
// 1) array - http verbs to check
// 2) the endpoint
// 3) Controller
Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);

//accepts 2 params
// 1- endpoint and 2-controller / function
Route::any('/blog', [PostsController::class, 'index']);


//Dont use Controller, just return view
//2 required params and 1 opt
//1-uri 2-view 3- array of data
Route::view('/blog', 'blog.index', ['name' => 'code with ariel']);