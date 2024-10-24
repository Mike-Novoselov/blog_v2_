<?php

namespace App\Http\Controllers\Api\ApiActions;

use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserAction
{
    public function execute(Request $request, User $user)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'string|min:8|nullable',
        ]);

        // Обновляем только измененные поля
        $user->update($request->only(['name', 'email', 'password']));

        return $user; // Возвращаем обновленного пользователя
    }
}
