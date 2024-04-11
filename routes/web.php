<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;




Route::get('/',[FrontendController::class,'index']);
Route::resource('tags', TagsController::class)->except(['show']);
Route::resource('categories', CategoriesController::class)->except(['show']);
Route::get('/categories/{category}',[FrontendController::class,'category'])->name('blogs.category');
Route::get('/tags/{tag}',[FrontendController::class,'tag'])->name('blogs.tag');
Route::get('/blogs/{post}',[FrontendController::class,'show'])->name('blogs.show');
Route::resource('posts', PostsController::class);



