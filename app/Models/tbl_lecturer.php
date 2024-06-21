<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class tbl_lecturer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_lecturer';
    protected $primaryKey = 'lecturer_id';

    protected $fillable = [
        'lecturer_firstname',
        'lecturer_email',
        'lecturer_address',
        'lecturer_numeber',
        'username',
        'password',
    ];
}
