<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
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

// USER
Route::get("/", function () {
    return view("index");
});



Route::prefix('admin')->group(function(){
    Route::get('list', [PostControler::class, 'index'])->name('posts'); // Show List Post Page
    Route::get('create', [PostControler::class, 'create']); // Show Create Post Page
    Route::post('create', [PostControler::class, 'store'])->name('posts.store'); // Do Create Post

    Route::get('edit/{post}', [PostControler::class, 'edit'])->name('posts.edit');
    Route::put('edit/{post}', [PostControler::class, 'update'])->name('posts.update');

    Route::delete('list/{post}', [PostControler::class, 'destroy'])->name('posts.delete');
});

// Route::get("berita", function () {
//     return view("admin.berita");
// });

// Route::get('news', [ViewController::class,'news'])->name('news');

// // ADMIN
// Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

// // ----> Berita
// Route::get('berita', [BeritaController::class,'index'])->name('admin.berita'); // Show Berita
// Route::post('berita', [BeritaController::class,'store'])->name('berita.store'); // Create Berita
// Route::get('/berita/edit/{id}', [BeritaController::class,'edit'])->name('berita.edit'); // Show Edit
// Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update'); // Do Update
// Route::delete('berita/{berita}', [BeritaController::class,'destroy'])->name('berita.destroy'); // Do Delete

// // ----> Galeri
// Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri'); // Show Galeri
// Route::post('galeri', [GaleriController::class, 'store'])->name('galeri.store'); // Create Galeri
// // -------------> Edit Galeri <------------
// Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('berita.edit'); // Show Edit
// Route::put('galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update'); // Do Update

// // -------------> Delete Galeri <------------
// Route::delete('galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeri.destroy'); // Do Delete