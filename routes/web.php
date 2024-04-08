<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return view('admin-panel.layouts.admin');
});
Route::resource('tags', TagsController::class)->except(['show']);
Route::resource('categories', CategoriesController::class)->except(['show']);

