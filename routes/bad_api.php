<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\UserGalleryController;


Route::get('/', function () {
    return view('welcome');
});

// Маршрут для отображения списка пользователей
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Маршрут для отображения формы создания нового пользователя
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Маршрут для сохранения нового пользователя
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Маршрут для отображения конкретного пользователя
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// Маршрут для отображения формы редактирования пользователя
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// Маршрут для обновления пользователя
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Маршрут для удаления пользователя
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


//Route::prefix('users/{userId}/galleries')->group(function () {
//    Route::get('/', [UserGalleryController::class, 'index'])->name('galleries.index');
//    Route::get('/create', [UserGalleryController::class, 'create'])->name('galleries.create');
//    Route::post('/', [UserGalleryController::class, 'store'])->name('galleries.store');
//    Route::delete('/{id}', [UserGalleryController::class, 'destroy'])->name('galleries.destroy');
//});
