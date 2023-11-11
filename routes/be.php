<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ImageController;

Route::prefix('/admin')->group(function (){
    Route::prefix('/user')->group(function (){
        Route::get('/',[AdminController::class, 'list'])->name('admin.user.list');
        Route::post('/add',[AdminController::class, 'add'])->name('admin.user.add');
        Route::post('/edit',[AdminController::class, 'edit'])->name('admin.user.edit');
    });
    Route::prefix('/category')->group(function (){
        Route::get('/',[CategoryController::class, 'list'])->name('admin.category.list');
    });
    Route::prefix('/post')->group(function (){
        Route::get('/',[PostController::class, 'list'])->name('admin.post.list');
    });
    Route::prefix('/image')->group(function (){
        Route::get('/',[ImageController::class, 'list'])->name('admin.image.list');
    });
});
?>
