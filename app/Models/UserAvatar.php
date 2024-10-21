<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory; автоматом подставилось.... (
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAvatar extends Model
{
    protected $fillable = ['user_id', 'avatar_path'];

    /**
     * Связь "один к одному" с пользователем.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
