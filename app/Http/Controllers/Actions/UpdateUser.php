<?php

namespace App\Http\Controllers\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUser
{
    public function execute($id, array $data)
    {
        $user = User::find($id);
        if (!$user) {
            return null;
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
        ]);

        return $user;
    }
}
