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


//access variable from config > services > mailgun domain variable
Route::get('/', function () {
    dd(config('services.mailgun.domain'));
    
    //access env varialbe
    dd(env('DB_HOST'));
    return view('welcome');
});