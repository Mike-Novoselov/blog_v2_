<?php

/**
Контроллер для api

 Получить всех пользователей
 GET /api/users

 Получение списка галереи пользователя
 GET /api/users/{id}/galleries

 Создать нового пользователя
 POST /api/users
 {
 "name": "John Doe",
 "email": "john@example.com",
 "password": "secret"
 }

 Получить аватар пользователя
 GET /api/users/{user}/avatar

 Добавить изображение в галерею пользователя
 POST /api/users/{user}/galleries
 {
 "image_path": "/images/gallery1.jpg"
 }
 **/


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    /**
     * Получить список всех пользователей.
     *
     */
    public function index()
    {
        // Возвращает все записи пользователей из базы данных
        return User::all();
    }

    /**
     * Создать нового пользователя.
     *
     */
    public function store(Request $request)
    {
        // Валидация входящих данных
        $request->validate([
            'name' => 'required|string|max:255',  // Имя обязательно, строка, максимум 255 символов
            'email' => 'required|email|unique:users',  // Email обязателен, должен быть уникальным в таблице users
            'password' => 'required|string|min:8',  // Пароль обязателен, минимум 8 символов
        ]);

        // Создание нового пользователя в базе данных
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Хеширование пароля
        ]);

        // Возвращает ответ с данными нового пользователя и статусом 201 (Created)
        return response()->json($user, 201);
    }

    /**
     * Получить данные конкретного пользователя.
     *
     */
    public function show(User $user)
    {
        // Возвращает данные пользователя, переданного через параметр маршрута
        return $user;
    }

    /**
     * Обновить данные пользователя.
     *
     */
    public function update(Request $request, User $user)
    {
        // Валидация входящих данных
        $request->validate([
            'name' => 'string|max:255',  // Имя должно быть строкой и не больше 255 символов
            'email' => 'email|unique:users,email,' . $user->id,  // Email должен быть уникальным, исключая текущего пользователя
            'password' => 'string|min:8|nullable',  // Пароль не обязателен, но если указан, должен быть минимум 8 символов
        ]);

        // Обновление данных пользователя
        $user->update($request->only(['name', 'email', 'password']));

        // Возвращает обновленного пользователя и статус 200 (OK)
        return response()->json($user, 200);
    }

    /**
     * Удалить пользователя.
     *
     */
    public function destroy(User $user)
    {
        // Удаление пользователя из базы данных
        $user->delete();

        // Возвращает пустой ответ с кодом 204 (No Content)
        return response()->json(null, 204);
    }
}


