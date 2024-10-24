<?php

namespace App\Http\Controllers\Api\ApiActions;

use App\Models\User;

class DeleteUserAction
{
    public function execute(User $user)
    {
        $user->delete(); // Удаляем пользователя

        return response()->json(null, 204); // Возвращаем успешный ответ
    }
}
