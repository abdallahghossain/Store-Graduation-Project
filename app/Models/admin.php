<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class admin extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles, Searchable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_name',
        'status',
        'address',
        'image',
        'mobile'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array'
    ];

}
