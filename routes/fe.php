<?php

use App\Http\Controllers\FindbyCateController;
use App\Http\Controllers\GetPostbyIdController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('home')->group(function (){
    Route::get('/', function () {
    });
});
Route::get('/',[HomeController::class,'home'])->name('home');
Route::prefix('/')->group(function (){
    Route::get('/post/{id}',[GetPostbyIdController::class,'GetpostbyId'])->name('getpostbyid');
    Route::get('/category/{id}',[FindbyCateController::class,'FindbyCate'])->name('findbycategory');
})
?>
