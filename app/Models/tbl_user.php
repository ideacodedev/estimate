<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class tbl_user extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_firstname',
        'username',
        'password',
    ];
}
