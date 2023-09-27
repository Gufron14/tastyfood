<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
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

Route::get("berita", function () {
    return view("admin.berita");
});

Route::get('news', [ViewController::class,'news'])->name('news');

// ADMIN
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

// ----> Berita
Route::get('berita', [BeritaController::class,'index'])->name('admin.berita'); // Show Berita

Route::post('berita', [BeritaController::class,'store'])->name('berita.store'); // Create Berita

Route::get('/berita/edit/{id}', [BeritaController::class,'edit'])->name('berita.edit'); // Show Edit
Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update'); // Do Update

Route::delete('berita/{berita}', [BeritaController::class,'destroy'])->name('berita.destroy'); // Do Delete