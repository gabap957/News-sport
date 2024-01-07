<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentChildController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FindbyCateController;
use App\Http\Controllers\GetPostbyIdController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::prefix('/')->group(function (){
    Route::get('/post/{id}',[GetPostbyIdController::class,'GetpostbyId'])->name('getpostbyid');
    Route::get('/category/{id}',[FindbyCateController::class,'FindbyCate'])->name('findbycategory');
    Route::post('/signup',[AuthController::class,'register'])->name('register');
    Route::post('/comment',[CommentController::class,'add'])->name('comment.add');
    Route::post('/commentchild',[CommentChildController::class,'add'])->name('commentchild.add');
    Route::post('/profile',[HomeController::class,'profile'])->name('profile.user');
})
?>
