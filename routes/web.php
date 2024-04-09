<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontendController;



Route::get('/',[FrontendController::class,'index']);
Route::resource('tags', TagsController::class)->except(['show']);
// Route::resource('categories', CategoriesController::class)->except(['show']);
Route::get('/categories/{category}',[FrontendController::class,'category'])->name('blogs.category');

