<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostControler;
use App\Http\Controllers\ViewController;
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

// ----------------------------------------- USER ----------------------------------------------------------------
Route::get("/", function () {
    return view("index");
});


// ----------------------------------------- ADMIN ----------------------------------------------------------------

// Auth Admin


Route::get("dashboard", function () {
    return view("admin.dashboard");
});

Route::prefix('admin/posts')->group(function(){
    Route::get('list', [PostControler::class, 'index'])->name('posts'); // Show List Post Page
    Route::get('create', [PostControler::class, 'create']); // Show Create Post Page
    Route::post('create', [PostControler::class, 'store'])->name('posts.store'); // Do Create Post

    Route::get('edit/{post}', [PostControler::class, 'edit'])->name('posts.edit'); // Show Edit Post Page
    Route::put('edit/{post}', [PostControler::class, 'update'])->name('posts.update'); // Do Update Post

    Route::delete('list/{post}', [PostControler::class, 'destroy'])->name('posts.delete'); // Do Delete Post
});

Route::prefix('admin/gallery')->group(function(){
    Route::get('list', [GalleryController::class, 'index'])->name('gallery'); // Show List Gallery Page
    Route::get('create', [GalleryController::class, 'create']); // Show Add Gallery Page
    Route::post('create', [GalleryController::class, 'store'])->name('gallery.store'); // Do Create Gallery

    Route::get('edit/{gallery}', [GalleryController::class, 'edit'])->name('gallery.edit'); // Show Edit Gallery Page
    Route::put('edit/{gallery}', [GalleryController::class, 'update'])->name('gallery.update'); // Do Update Gallery

    Route::delete('list/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.delete'); // Do Delete Post
});