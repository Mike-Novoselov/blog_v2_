<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\SoftDeletes;

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
}
