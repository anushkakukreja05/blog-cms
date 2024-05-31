<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;



Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin-panel.dashboard');
    })->name('dashboard');

    Route::resource('tags', TagsController::class)->except(['show']);
Route::resource('categories', CategoriesController::class)->except(['show']);

Route::get('/posts/trashed',[PostsController::class,'trashed'])->name('posts.trashed');

Route::resource('posts', PostsController::class);
Route::put('posts/{post}/publish-now',[PostsController::class,'publish'])->name('posts.publish');

Route::put('posts/trashed/{post}/restore',[PostsController::class,'restore'])->name('posts.restore');
Route::delete('posts/trashed/{post}/destroy',[PostsController::class,'forceDelete'])->name('posts.forceDelete');

});
Route::get('/',[FrontendController::class,'index']);

Route::get('/categories/{category}',[FrontendController::class,'category'])->name('blogs.category');
Route::get('/tags/{tag}',[FrontendController::class,'tag'])->name('blogs.tag');
Route::get('/blogs/{post}',[FrontendController::class,'show'])->name('blogs.show');





// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('admin-panel.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
