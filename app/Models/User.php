<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    static public function getAllUsers()
    {
        return self::query()->whereNot('email', 'admin@admin.com')->get();
    }

    static public function getUserNameById($user_id)
    {
        return self::query()
            ->where('id', $user_id)
            ->first();
    }

    protected $attributes = [
        'active' => true,
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'active',
        'admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
