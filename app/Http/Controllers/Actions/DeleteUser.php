<?php

namespace App\Http\Controllers\Actions;

use App\Models\User;

class DeleteUser
{
    public function execute($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return $user;
    }
}
