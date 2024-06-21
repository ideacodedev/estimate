<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_at extends Model
{
    use HasFactory;
    protected $table = 'tbl_at';
    protected $primaryKey = 'at_id';

    protected $fillable = [
        'user_id',
        'room_id',
        'at_role',
        'at_year',
    ];
    public function at_list()
    {
        return $this->hasMany(tbl_at_list::class,'at_id','at_id');
    }
    public function room()
    {
        return $this->hasOne(tbl_room::class,'room_id','room_id');
    }
    public function student()
    {
        return $this->hasOne(tbl_student::class,'student_id','user_id');
    }
    public function lecturer()
    {
        return $this->hasOne(tbl_lecturer::class,'lecturer_id','user_id');
    }
}
