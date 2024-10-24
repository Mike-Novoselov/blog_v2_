<?php

namespace App\Http\Controllers\Api\ApiActions;

use App\Models\User;

class GetAllUsersAction
{
    public function execute()
    {
        return User::all(); // Возвращает всех пользователей
    }
}
