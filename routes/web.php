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
//Route::get('/login', function () {
//    return view('authentication.login');
//});
Route::get('/404', function () {
    return view('404.404');
});
include_once __DIR__.'/be.php';
include_once __DIR__.'/fe.php';
