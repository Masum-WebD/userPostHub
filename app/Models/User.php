<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'otp',
    ];

    function posts(){
        $this->hasMany(User::class, 'id');
    }
}
