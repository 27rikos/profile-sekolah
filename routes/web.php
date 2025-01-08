<?php

use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\FotoController;
use App\Http\Controllers\admin\GoalsController;
use App\Http\Controllers\admin\HistoryController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\ValidatingController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ReadController;
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

// public route
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('verified', [LoginController::class, 'auth'])->name('authentication');
// private route:admin:

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('users-management', UsersController::class);
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

    Route::get('goals/create', [GoalsController::class, 'create'])->name('goals.create');
    Route::post('goals/store', [GoalsController::class, 'store'])->name('goals.store');
    Route::get('goals/{id}/edit', [GoalsController::class, 'edit'])->name('goals.edit');
    Route::put('goals/{id}/update', [GoalsController::class, 'update'])->name('goals.update');
    Route::get('goals/{id}/destroy', [GoalsController::class, 'destroy'])->name('goals.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('read-news/{slug}/detail', [ReadController::class, 'detail_news'])->name('read-news');
