<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class tbl_student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_student';
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'student_code',
        'student_firstname',
        'student_email',
        'student_address',
        'student_numeber',
        'username',
        'password',
    ];
}
