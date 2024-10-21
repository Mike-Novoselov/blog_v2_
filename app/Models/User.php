<?php

/**
Модель - это специальный класс в Laravel,
который представляет таблицу в базе данных и позволяет легко взаимодействовать с её записями
**/


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    public $testsEnubody;

    protected $table = 'users';


    /**
    $fillable: Этот массив определяет, какие поля можно массово заполнять (например, при использовании метода create()).
    **/

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
    $hidden: Скрытые поля при сериализации, чтобы пароли не отображались при выводе данных.
     **/
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
    setPasswordAttribute: Автоматическая хешировка пароля при его установке,
    так что это будет происходить всегда, когда ты задаешь пароль через модель
    **/
    public function setPasswordAttribute($password)
    {
        if ($password) {
            $this->attributes['password'] = Hash::make($password);
        }
    }


    /**
    Добавление связи в модели
    метод для отношения "один к одному"
    **/
    public function avatar(): HasOne
    {
        return $this->hasOne(UserAvatar::class);
    }


    /**
     * Связь "один ко многим" с таблицей галереи пользователей.
     */
    public function galleries(): HasMany
    {
        return $this->hasMany(UserGallery::class);
    }

}
