<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserGallery extends Model
{
    protected $fillable = ['user_id', 'image_path'];

    /**
     * Связь "многие к одному" с моделью пользователя.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
