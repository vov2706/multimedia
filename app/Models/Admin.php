<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'login',
        'password',
    ];

    protected string $guard_name = 'admin';

    protected $hidden = [
        'password', 'remember_token'
    ];
}
