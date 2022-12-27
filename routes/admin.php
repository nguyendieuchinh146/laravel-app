<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

Route::middleware(['admin'])->group(function () {
    Route::get('/', function () {
        echo 1; die;
    });

    Route::get('/user/profile', function () {
        echo "user";die;
    });
    Route::prefix('cars')->group(function () {
        Route::get('/show/{id}', [CarController::class, 'show'])->name('cars.show');
        Route::get('/add', [CarController::class, 'add'])->name('cars.add');
        Route::get('/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');
        Route::post('/update', [CarController::class, 'update'])->name('cars.update');
    });

});
