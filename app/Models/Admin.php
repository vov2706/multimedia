<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
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
