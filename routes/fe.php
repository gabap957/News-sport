<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('home')->group(function (){
    Route::get('/', function () {
    });
});
Route::get('/',[HomeController::class,'home'])->name('home');

?>
