<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\DashboardController;

Route::prefix('/admin')->middleware('admin')->group(function (){
    Route::prefix('/dashboard')->group(function (){
        Route::get('/',[DashboardController::class, 'dashboard'])->name('admin.dashboard');
    });
    Route::prefix('/user')->group(function (){
        Route::get('/',[UserController::class, 'list'])->name('admin.user.list');
        Route::post('/add',[UserController::class, 'add'])->name('admin.user.add');
        Route::post('/edit',[UserController::class, 'edit'])->name('admin.user.edit');
        Route::get('/delete/{id}',[UserController::class, 'delete'])->name('admin.user.delete');
    });
    Route::prefix('/category')->group(function (){
        Route::get('/',[CategoryController::class, 'list'])->name('admin.category.list');
        Route::post('/add',[CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('/edit',[CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('admin.category.delete');
    });
    Route::prefix('/type')->group(function (){
        Route::get('/',[TypeController::class, 'list'])->name('admin.type.list');
        Route::post('/add',[TypeController::class, 'add'])->name('admin.type.add');
        Route::post('/edit',[TypeController::class, 'edit'])->name('admin.type.edit');
        Route::get('/delete/{id}',[TypeController::class, 'delete'])->name('admin.type.delete');
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
        Route::get('/{id}',[AlbumController::class, 'dolist'])->name('admin.album.dolist');
    });
    Route::prefix('/image')->group(function (){
        Route::get('/{id}',[ImageController::class, 'list'])->name('admin.image.list');
        Route::get('/',[ImageController::class, 'listall'])->name('admin.image.listall');
        Route::post('/add',[ImageController::class, 'add'])->name('admin.image.add');
        Route::post('/edit',[ImageController::class, 'edit'])->name('admin.image.edit');
        Route::get('/delete/{id}',[ImageController::class, 'delete'])->name('admin.image.delete');
    });
    Route::post('/upload', [PostController::class, 'upload'])->name('ckeditor.upload');
});
    Route::get('/login',[loginController::class,'viewLogin'])->middleware('login')->name('login');
    Route::post('/admin',[loginController::class,'login'])->name('admin.login');
    Route::get('/logout',[loginController::class,'logout'])->name('logout');
?>
