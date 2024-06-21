<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class tbl_officer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_officer';
    protected $primaryKey = 'officer_id';

    protected $fillable = [
        'officer_firstname',
        'officer_email',
        'officer_address',
        'officer_numeber',
        'username',
        'password',
    ];
    public function officer_room()
    {
        return $this->hasMany(tbl_officer_room::class, 'officer_id', 'officer_id');
    }
}
