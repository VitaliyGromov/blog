<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    static public function getUserNameById($user_id)
    {
        return self::query()
            ->where('id', $user_id)
            ->get(['last_name', 'first_name'])
            ->toArray();
    }

    protected $attributes = [
        'active' => true,
        'admin' => false,
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
