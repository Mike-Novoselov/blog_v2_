<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAvatar;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    /**
     * Показать аватар конкретного пользователя.
     *
     */
    public function show(User $user)
    {
        // Если у пользователя есть аватар, возвращаем его.
        // Если аватара нет, возвращаем сообщение об ошибке с кодом 404 (Not Found).
        return $user->avatar ?? response()->json(['message' => 'Avatar not found'], 404);
    }

    /**
     * Загрузить новый аватар для пользователя.
     *
     */
    public function store(Request $request, User $user)
    {
        // Валидация входящих данных: путь до аватара обязателен и должен быть строкой.
        $request->validate([
            'avatar_path' => 'required|string',
        ]);

        // Создание новой записи аватара для пользователя в базе данных.
        $avatar = $user->avatar()->create([
            'avatar_path' => $request->avatar_path,
        ]);

        // Возвращаем данные нового аватара с кодом 201 (Created).
        return response()->json($avatar, 201);
    }

    /**
     * Обновить существующий аватар пользователя.
     *
     */
    public function update(Request $request, User $user)
    {
        // Валидация входящих данных: путь до аватара обязателен и должен быть строкой.
        $request->validate([
            'avatar_path' => 'required|string',
        ]);

        // Получаем текущий аватар пользователя.
        $avatar = $user->avatar;
        if (!$avatar) {
            // Если аватар не найден, возвращаем сообщение об ошибке с кодом 404 (Not Found).
            return response()->json(['message' => 'Avatar not found'], 404);
        }

        // Обновляем путь до аватара.
        $avatar->update([
            'avatar_path' => $request->avatar_path,
        ]);

        // Возвращаем обновленные данные аватара с кодом 200 (OK).
        return response()->json($avatar, 200);
    }

    /**
     * Удалить аватар пользователя.
     *
     */
    public function destroy(User $user)
    {
        // Получаем текущий аватар пользователя.
        $avatar = $user->avatar;
        if (!$avatar) {
            // Если аватар не найден, возвращаем сообщение об ошибке с кодом 404 (Not Found).
            return response()->json(['message' => 'Avatar not found'], 404);
        }

        // Удаляем аватар.
        $avatar->delete();

        // Возвращаем пустой ответ с кодом 204 (No Content), указывая, что операция прошла успешно.
        return response()->json(null, 204);
    }
}
