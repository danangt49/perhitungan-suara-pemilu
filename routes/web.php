<?php

use App\Http\Controllers\PerolehanSuaraController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

// General routes
Auth::routes(['reset' => true, 'register' => false]);
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/results-json', [HomeController::class, 'getResultsJson']);
Route::get('data-caleg', [UserController::class, 'getCaleg']);
Route::get('tps-options', [TpsController::class, 'tpsOptions']);
Route::get('data-kecamatan-options', [TpsController::class, 'getKecamatanOptions']);
Route::get('data-kelurahan-options', [TpsController::class, 'getKelurahanOptions']);
Route::get('data-tps-options', [TpsController::class, 'getTpsOptions']);
Route::get('tps-options/{currentKodeTps?}', [TpsController::class, 'tpsOptions']);
Route::get('tps-options-suara/{currentKodeTps?}', [TpsController::class, 'tpsOptionsSuara']);
Route::get('data-saksi-options', [TpsController::class, 'options']);

// saksi routes
Route::middleware(['role:saksi'])->group(function () {
    Route::get('input-perolehan-suara', [PerolehanSuaraController::class, 'input']);
    Route::post('/check-data-exists', [PerolehanSuaraController::class, 'checkDataExists']);
    Route::resource('perolehan-suara', PerolehanSuaraController::class);
});

// Admin routes
Route::middleware(['role:admin' , 'role:owner'])->group(function () {
    Route::get('tps/print', [TpsController::class, 'print'])->name('tps.print');
    Route::resource('tps', TpsController::class);
    Route::get('tps-json', [TpsController::class, 'json']);

    Route::get('saksi/print', [UserController::class, 'print'])->name('saksi.print');
    Route::resource('saksi', UserController::class);
    Route::get('saksi-json', [UserController::class, 'json']);

    Route::get('perolehan-suaras/print', [PerolehanSuaraController::class, 'print'])->name('perolehan-suaras.print');
    Route::resource('perolehan-suara', PerolehanSuaraController::class);
    Route::get('perolehan-suara-json', [PerolehanSuaraController::class, 'json']);
});
