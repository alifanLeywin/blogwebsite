<?php

use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('article', ArticleController::class);

Route::resource('/categories', CategoryController::class)->only([
    'index', 'store', 'update', 'destroy'
]);