<?php

namespace App\Http\Controllers\Actions;

use App\Models\User;

class ReadUser
{
    public function execute($id = null)
    {
        if ($id) {
            return User::find($id);
        }
        return User::all();
    }
}
