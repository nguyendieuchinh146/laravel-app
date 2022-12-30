<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Admin\Controllers\CourseController;
use App\Http\Admin\Controllers\LessonController;

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
        Route::get('/list', [CarController::class, 'list'])->name('cars.list');
        Route::get('/show/{id}', [CarController::class, 'show'])->name('cars.show');
        Route::get('/add', [CarController::class, 'add'])->name('cars.add');
        Route::get('/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');
        Route::post('/update', [CarController::class, 'update'])->name('cars.update');
        Route::get('/import', [CarController::class, 'importView'])->name('cars.import');
        Route::post('/import', [CarController::class, 'import'])->name('cars.import.file');
        Route::get('/delete/{id}', [CarController::class, 'delete'])->name('cars.delete');
    });

    Route::prefix('course')->group(function () {
        Route::get('/list', [CourseController::class, 'list'])->name('admin.course.list');
        Route::get('/show/{id}', [CourseController::class, 'show'])->name('admin.course.show');
        Route::get('/add', [CourseController::class, 'add'])->name('admin.course.add');
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('admin.course.edit');
        Route::post('/update', [CourseController::class, 'update'])->name('admin.course.update');
        Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('admin.course.delete');
    });

    Route::prefix('lesson')->group(function () {
        Route::get('/list', [LessonController::class, 'list'])->name('admin.lesson.list');
        Route::get('/show/{id}', [LessonController::class, 'show'])->name('admin.lesson.show');
        Route::get('/add', [LessonController::class, 'add'])->name('admin.lesson.add');
        Route::get('/edit/{id}', [LessonController::class, 'edit'])->name('admin.lesson.edit');
        Route::post('/update', [LessonController::class, 'update'])->name('admin.lesson.update');
        Route::get('/delete/{id}', [LessonController::class, 'delete'])->name('admin.lesson.delete');
    });

});
