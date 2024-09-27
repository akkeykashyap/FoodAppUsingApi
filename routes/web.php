<?php

use App\Http\Controllers\FoodsController;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\post;

Route::get('/', function () {
    return view('welcome');
});


Route::get('food',[FoodsController::class,'display']);

Route::match(['get','post'],'food',[FoodsController::class,'display'])->name('food.food');

Route::get('food/{id}', [FoodsController::class, 'show'])->name('food.details');

Route::get('food/details/{id}', [FoodsController::class, 'show'])->name('food.details');
