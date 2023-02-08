<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\BlogController::class, 'home'])->name('blog.home');
Route::get('/detail/{slug}', [\App\Http\Controllers\BlogController::class, 'liatdetailpost'])->name('blog.post.detail');
Route::get('/categories', [\App\Http\Controllers\BlogController::class, 'showCategories'])->name('blog.categories');
Route::get('/categories/{slug}', [\App\Http\Controllers\BlogController::class, 'showPostsByCategory'])->name('blog.posts.category');
Route::get('/tags', [\App\Http\Controllers\BlogController::class, 'showTags'])->name('blog.tags');
Route::get('/tags/{slug}', [\App\Http\Controllers\BlogController::class, 'showPostsByTag'])->name('blog.posts.tags');
Route::get('/search', [\App\Http\Controllers\BlogController::class, 'searchPost'])->name('blog.search');
Route::get('/registrasi', [\App\Http\Controllers\RegistrasiController::class, 'index'])->name('registrasi');
Route::post('/registrasi', [\App\Http\Controllers\RegistrasiController::class, 'postregis'])->name('registrasi.post');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);
Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    //dashboard
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    //category
    Route::get('/categories/select', [\App\Http\Controllers\CategoryController::class, 'select'])->name('categories.select');
    Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
    //tag
    Route::get('/tags/select', [\App\Http\Controllers\TagController::class, 'select'])->name('tags.select');
    Route::resource('/tags', \App\Http\Controllers\TagController::class)->except('show');
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    //FM
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/index', [\App\Http\Controllers\FileManagerController::class, 'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    }
    );
});
