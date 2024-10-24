<?php

namespace App\Http\Controllers\Api\ApiActions;

use App\Models\User;

class GetUserAction
{
    public function execute(User $user)
    {
        return $user; // Возвращает конкретного пользователя
    }
}
