<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Actions\CreateUser;
use App\Http\Controllers\Actions\ReadUser;
use App\Http\Controllers\Actions\UpdateUser;
use App\Http\Controllers\Actions\DeleteUser;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Метод для отображения списка всех пользователей
    public function index()
    {
        // Используем действие ReadUser для получения всех пользователей
        $users = (new ReadUser())->execute();
        return view('users.index', compact('users'));
    }

    // Метод для отображения формы создания нового пользователя
    public function create()
    {
        return view('users.create');
    }

    // Метод для сохранения нового пользователя
    public function store(Request $request)
    {
        // Используем действие CreateUser для создания пользователя
        $user = (new CreateUser())->execute($request->all());
        return redirect('/users')->with('success', 'User created successfully');
    }

    // Метод для отображения информации о конкретном пользователе
    public function show($id)
    {
        // Используем действие ReadUser для получения пользователя по ID
        $user = (new ReadUser())->execute($id);
        return view('users.show', compact('user'));
    }

    // Метод для отображения формы редактирования пользователя
    public function edit($id)
    {
        // Используем действие ReadUser для получения пользователя по ID
        $user = (new ReadUser())->execute($id);
        return view('users.edit', compact('user'));
    }

    // Метод для обновления данных пользователя
    public function update(Request $request, $id)
    {
        // Используем действие UpdateUser для обновления данных пользователя
        $user = (new UpdateUser())->execute($id, $request->all());
        return redirect('/users')->with('success', 'User updated successfully');
    }

    // Метод для удаления пользователя
    public function destroy($id)
    {
        // Используем действие DeleteUser для удаления пользователя
        (new DeleteUser())->execute($id);
        return redirect('/users')->with('success', 'User deleted successfully');
    }
}
