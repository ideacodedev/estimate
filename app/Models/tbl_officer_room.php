<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_officer_room extends Model
{
    use HasFactory;

    protected $table = 'tbl_officer_room';
    protected $primaryKey = 'officer_room_id';

    protected $fillable = [
        'room_id',
        'officer_id',
    ];
    public function room()
    {
        return $this->hasOne(tbl_room::class,'room_id','room_id');
    }
    public function officer()
    {
        return $this->hasOne(tbl_officer::class,'officer_id','officer_id');
    }
}
