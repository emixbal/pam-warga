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

Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

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

Route::group(['prefix' => 'lingkungan', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\LingkunganController::class, 'index'])->name('lingkungan.index');
    Route::post('/', [App\Http\Controllers\LingkunganController::class, 'store'])->name('lingkungan.store');
    Route::put('/{id}', [App\Http\Controllers\LingkunganController::class, 'update'])->name('lingkungan.update');
    Route::delete('/{id}', [App\Http\Controllers\LingkunganController::class, 'delete'])->name('lingkungan.delete');
});

Route::group(['prefix' => 'warga', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\WargaController::class, 'index'])->name('warga.index');
    Route::post('/', [App\Http\Controllers\WargaController::class, 'store'])->name('warga.store');
    Route::put('/{id}', [App\Http\Controllers\WargaController::class, 'update'])->name('warga.update');
    Route::delete('/{id}', [App\Http\Controllers\WargaController::class, 'delete'])->name('warga.delete');
});

Route::group(['prefix' => 'tarif', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\TarifController::class, 'index'])->name('tarif.index');
    Route::post('/', [App\Http\Controllers\TarifController::class, 'store'])->name('tarif.store');
    Route::put('/{id}', [App\Http\Controllers\TarifController::class, 'update'])->name('tarif.update');
    Route::delete('/{id}', [App\Http\Controllers\TarifController::class, 'delete'])->name('tarif.delete');
});

Route::group(['prefix' => 'period', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\PeriodController::class, 'index'])->name('period.index');
    Route::post('/', [App\Http\Controllers\PeriodController::class, 'store'])->name('period.store');
    Route::put('/{id}', [App\Http\Controllers\PeriodController::class, 'update'])->name('period.update');
    Route::delete('/{id}', [App\Http\Controllers\PeriodController::class, 'delete'])->name('period.delete');
});

Route::get('/file/{dir}/{filename}', function ($dir, $filename) {
    $path = storage_path("app/public/$dir/" . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
}, )->name('file')->middleware(['auth']);
