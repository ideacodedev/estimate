<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_at_list extends Model
{
    use HasFactory;
    protected $table = 'tbl_at_list';
    protected $primaryKey = 'at_list_id';

    protected $fillable = [
        'at_id',
        'at_list_score',
        'at_list_note',
        'room_ed_id',
    ];
    public function room_ed()
    {
        return $this->hasOne(tbl_room_ed::class,'room_ed_id','room_ed_id');
    }
}
