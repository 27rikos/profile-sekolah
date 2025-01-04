<?php

use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\FotoController;
use App\Http\Controllers\admin\HistoryController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ValidatingController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('layout.app');
});

// public route
Route::get('login', [LoginController::class, 'index'])->name('login');
// private route:admin:
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('kategori-berita', KategoriController::class);
Route::resource('berita', BeritaController::class);
Route::get('publish/{id}', [ValidatingController::class, 'publish'])->name('publish');
Route::get('draft/{id}', [ValidatingController::class, 'draft'])->name('draft');
Route::resource('photo', FotoController::class);
Route::resource('videos', VideoController::class);
Route::resource('event', EventController::class);
Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::get('histories/create', [HistoryController::class, 'create'])->name('history.create');
Route::post('histories/store', [HistoryController::class, 'store'])->name('history.store');
Route::get('histories/{id}/edit', [HistoryController::class, 'edit'])->name('history.edit');
Route::put('histories/{id}/update', [HistoryController::class, 'update'])->name('history.update');
Route::get('histories/{id}/destroy', [HistoryController::class, 'destroy'])->name('history.destroy');
