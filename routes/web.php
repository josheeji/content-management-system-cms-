<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BannerItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\PostController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
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





Route::get('/', function () {
    return view('layouts.frontend.app');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/auth/dashboard', [DashboardController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth');




// frontend


// Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('{menu_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
// dd('here'); 
// Route::get('swalamban/about-us', function () {
//     return view('pages.frontend.aboutUs.index');
// });






// Backend
Route::prefix('/auth/posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('/{id}/edit', [PostController::class, 'edit']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::delete('/{id}', [PostController::class, 'destroy']);
});

Route::prefix('auth/contents')->group(function () {
    Route::get('/', [ContentController::class, 'index']);
    Route::get('/create', [ContentController::class, 'create']);
    Route::post('/', [ContentController::class, 'store']);
    Route::get('/{id}/edit', [ContentController::class, 'edit']);
    Route::put('/{id}', [ContentController::class, 'update']);
});



Route::prefix('auth/banners')->group(function () {
    Route::get('/', [BannerController::class, 'index']);
    Route::get('/create', [BannerController::class, 'create']);
    Route::post('/', [BannerController::class, 'store']);
    Route::get('/{id}/edit', [BannerController::class, 'edit']);
    Route::put('/{id}', [BannerController::class, 'update']);
});

Route::prefix('auth/banners')->group(function () {
    Route::get('/{banner_id}/banner-items', [BannerItemController::class, 'index'])->name('auth.bannerItem.index');
    Route::get('/{banner_id}/banner-items/create', [BannerItemController::class, 'create'])->name('auth.bannerItem.create');
    Route::post('/{banner_id}/banner-items', [BannerItemController::class, 'store']);
    Route::get('/{banner_id}/banner-items/{id}/edit', [BannerItemController::class, 'edit'])->name('auth.bannerItem.edit');
    Route::put('/{banner_id}/banner-items/{id}', [BannerItemController::class, 'update']);
    Route::get('/{banner_id}/banner-items/{id}/delete', [BannerItemController::class, 'destroy']);
});

Route::prefix('/auth/menus')->group(function () {
    Route::get('/', [MenuController::class, 'index']);
    Route::get('/create', [MenuController::class, 'create']);
    Route::post('/', [MenuController::class, 'store']);
    Route::get('/{id}/edit', [MenuController::class, 'edit']);
    Route::put('/{id}', [MenuController::class, 'update']);
    Route::delete('/{id}/delete', [MenuController::class, 'destroy']);

    Route::get('/{id}/detail', [MenuController::class, 'detail']);
});


Route::prefix('auth/menus')->group(function () {
    Route::get('/{menu_id}/menu-items', [MenuItemController::class, 'index']);
    Route::get('/{menu_id}/menu-items/create', [MenuItemController::class, 'create']);
    Route::post('/{menu_id}/menu-items', [MenuItemController::class, 'store']);
    Route::get('/{menu_id}/menu-items/{id}/edit', [MenuItemController::class, 'edit']);
    Route::put('/{menu_id}/menu-items/{id}', [MenuItemController::class, 'update']);
    Route::delete('/{menu_id}/menu-items/{id}', [MenuItemController::class, 'destroy']);
});

Route::prefix('auth/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/create', [CategoryController::class, 'create']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::get('/{id}/delete', [CategoryController::class, 'destroy']);
});

// Route::get('/', function () {
//     return view('pages.frontend.home.index');
// });
