<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
