<?php

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

// Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/process', [App\Http\Controllers\AuthController::class, 'login_process'])->name('login.process');
});

Route::group(['prefix' => 'kode-rekening', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\KodeRekeningController::class, 'index'])->name('kode_rekening.index');
    Route::post('/', [App\Http\Controllers\KodeRekeningController::class, 'store'])->name('kode_rekening.store');
    Route::put('/{id}', [App\Http\Controllers\KodeRekeningController::class, 'update'])->name('kode_rekening.update');
    Route::delete('/{id}', [App\Http\Controllers\KodeRekeningController::class, 'delete'])->name('kode_rekening.delete');
});

Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

Route::get('/file/{dir}/{filename}', function ($dir, $filename) {
    $path = storage_path("app/public/$dir/" . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
}, )->name('file')->middleware(['auth']);

