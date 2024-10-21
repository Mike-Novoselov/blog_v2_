<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGallery;
use Illuminate\Http\Request;

class UserGalleryController extends Controller
{
    /**
     * Показать все фотографии галереи конкретного пользователя.
     *
     */
    public function index(User $user)
    {
        // Возвращаем список всех фотографий галереи пользователя
        return $user->galleries;
    }

    /**
     * Добавить новую фотографию в галерею пользователя.
     *
     */
    public function store(Request $request, User $user)
    {
        // Валидация данных: путь к изображению обязателен и должен быть строкой
        $request->validate([
            'image_path' => 'required|string',
        ]);

        // Создание новой записи в галерее пользователя
        $gallery = $user->galleries()->create([
            'image_path' => $request->image_path,
        ]);

        // Возвращаем данные созданной фотографии с кодом 201 (Created)
        return response()->json($gallery, 201);
    }

    /**
     * Показать конкретную фотографию из галереи.
     *
     */
    public function show(UserGallery $gallery)
    {
        // Возвращаем данные о конкретной фотографии
        return $gallery;
    }

    /**
     * Обновить данные фотографии в галерее.
     *
     */
    public function update(Request $request, UserGallery $gallery)
    {
        // Валидация данных: путь к изображению обязателен и должен быть строкой
        $request->validate([
            'image_path' => 'required|string',
        ]);

        // Обновление записи фотографии
        $gallery->update([
            'image_path' => $request->image_path,
        ]);

        // Возвращаем обновленную информацию о фотографии с кодом 200 (OK)
        return response()->json($gallery, 200);
    }

    /**
     * Удалить фотографию из галереи.
     *
     */
    public function destroy(UserGallery $gallery)
    {
        // Удаление записи фотографии из базы данных
        $gallery->delete();

        // Возвращаем пустой ответ с кодом 204 (No Content), указывая, что операция прошла успешно
        return response()->json(null, 204);
    }
}
