<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\UserAvatarController;
use App\Http\Controllers\Api\UserGalleryController;


// Маршруты для работы с пользователями
// Автоматически генерирует CRUD маршруты для UserController:
// GET /users (index) - получить список пользователей
// POST /users (store) - создать нового пользователя
// GET /users/{user} (show) - получить конкретного пользователя
// PUT /users/{user} (update) - обновить данные пользователя
// DELETE /users/{user} (destroy) - удалить пользователя
Route::apiResource('users', ApiUserController::class);

// Маршруты для работы с аватарами пользователей
// GET /users/{user}/avatar - получить аватар пользователя
Route::get('users/{user}/avatar', [UserAvatarController::class, 'show'])->name('user.avatar.show');

// POST /users/{user}/avatar - загрузить новый аватар для пользователя
Route::post('users/{user}/avatar', [UserAvatarController::class, 'store'])->name('user.avatar.store');

// PUT /users/{user}/avatar - обновить существующий аватар пользователя
Route::put('users/{user}/avatar', [UserAvatarController::class, 'update'])->name('user.avatar.update');

// DELETE /users/{user}/avatar - удалить аватар пользователя
Route::delete('users/{user}/avatar', [UserAvatarController::class, 'destroy'])->name('user.avatar.destroy');

// Маршруты для работы с галереей пользователей
// Генерирует CRUD маршруты для UserGalleryController, используя вложенные маршруты (users.galleries):
// GET /users/{user}/galleries (index) - получить список фотографий галереи пользователя
// POST /users/{user}/galleries (store) - загрузить новую фотографию в галерею пользователя
// GET /galleries/{gallery} (show) - получить конкретную фотографию галереи (shallow routing)
// PUT /galleries/{gallery} (update) - обновить информацию о фотографии галереи
// DELETE /galleries/{gallery} (destroy) - удалить фотографию из галереи
Route::apiResource('users.galleries', UserGalleryController::class)->shallow();
