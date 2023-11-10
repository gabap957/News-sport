<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;

Route::prefix('/admin')->group(function (){
    Route::prefix('/user')->group(function (){
        Route::get('/',[AdminController::class, 'list'])->name('admin.user.list');
        Route::post('/add',[AdminController::class, 'add'])->name('admin.user.add');
        Route::post('/edit',[AdminController::class, 'edit'])->name('admin.user.edit');
    });
    Route::prefix('/category')->group(function (){
        Route::get('/',[CategoryController::class, 'list'])->name('admin.category.list');
    });
});
?>
