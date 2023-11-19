<?php

use App\Http\Controllers\AlbumController;
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
        Route::get('/delete/{id}',[AdminController::class, 'delete'])->name('admin.user.delete');
    });
    Route::prefix('/category')->group(function (){
        Route::get('/',[CategoryController::class, 'list'])->name('admin.category.list');
        Route::post('/add',[CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('/edit',[CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('admin.category.delete');
    });
    Route::prefix('/post')->group(function (){
        Route::get('/',[PostController::class, 'list'])->name('admin.post.list');
        Route::get('/add',[PostController::class, 'doadd'])->name('admin.post.doadd');
        Route::post('/add',[PostController::class, 'add'])->name('admin.post.add');
        Route::post('/edit',[PostController::class, 'edit'])->name('admin.post.edit');
        Route::get('/edit/{id}',[PostController::class, 'doedit'])->name('admin.post.doedit');
        Route::get('/delete/{id}',[PostController::class, 'delete'])->name('admin.post.delete');
    });
    Route::prefix('/album')->group(function (){
        Route::get('/',[AlbumController::class, 'list'])->name('admin.album.list');
    });
    Route::prefix('/image')->group(function (){
        Route::get('/{id}',[ImageController::class, 'list'])->name('admin.image.list');
    });
});
?>
