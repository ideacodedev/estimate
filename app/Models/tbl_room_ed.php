<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_room_ed extends Model
{
    use HasFactory;
    protected $table = 'tbl_room_ed';
    protected $primaryKey = 'room_ed_id';

    protected $fillable = [
        'ed_id',
        'room_id',
    ];
    public function ed()
    {
        return $this->hasOne(tbl_ed::class, 'ed_id', 'ed_id');
    }
    public function room()
    {
        return $this->hasOne(tbl_room::class, 'room_id', 'room_id');
    }
}
