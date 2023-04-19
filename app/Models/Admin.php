<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'photo',
        'password',
        'created_at',
        'updated_at'
    ];
}
