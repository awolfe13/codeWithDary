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
    //show debugger functionality
    Debugbar::class::error('error');
    Debugbar::class::info('INFO');
    Debugbar::class::warning('warning');
    Debugbar::class::addMessage('message');
    
    try {
        throw new Exception('Try Message');
    } catch(Exception $e) {
        Debugbar::class::addException($e);
    }
    //under views -shows params passed
    $name = "Code with Dary";
    return view('welcome', [
        'name' => $name
    ]);
});