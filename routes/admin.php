<?php

use App\Http\Controllers\Admin\ListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;

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

Route::get('', [AuthController::class, 'redirectToLogin']);
Route::get('login', [AuthController::class, 'getLogin'])->name('admin-login');
Route::post('login', [AuthController::class, 'getLogin'])->name('admin-login-post');

Route::group(['middleware' => ['admin.auth'], 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('list', [ListController::class, 'list'])->name('list');
    Route::match(['GET', 'POST'], 'add', [ListController::class, 'add'])->name('add');
    Route::match(['GET', 'POST'], 'edit/{id}', [ListController::class, 'add'])->name('edit');
    Route::match(['DELETE'], 'delete/{id?}', [ListController::class, 'delete'])->name('delete');

    Route::group(['prefix' => 'game', 'as' => 'game.'], function () {
        Route::match(['GET', 'POST'], 'list', [GameController::class, 'list'])->name('list');
        Route::match(['GET', 'POST'], 'export', [GameController::class, 'export'])->name('export');
        Route::get('add/{game?}', [GameController::class, 'add'])->name('add');
        Route::post('add/{game?}', [GameController::class, 'store'])->name('store');
        Route::delete('delete/{game?}', [GameController::class, 'delete'])->name('delete');
    });
});
