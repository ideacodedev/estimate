<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_room extends Model
{
    use HasFactory;
    protected $table = 'tbl_room';
    protected $primaryKey = 'room_id';

    protected $fillable = [
        'room_name',
        'building_id',
    ];
    public function room_user()
    {
        if (auth()->guard('students')->check()) {

            return $this->hasMany(tbl_at::class, 'room_id', 'room_id')
                ->where('user_id', auth()->guard('students')->user()->student_id)
                ->where('at_role', 1);

        } elseif (auth()->guard('lecs')->check()) {
            return $this->hasMany(tbl_at::class, 'room_id', 'room_id')
                ->where('user_id', auth()->guard('lecs')->user()->lecturer_id)
                ->where('at_role', 2);
        }
    }
    public function room_ed()
    {
        return $this->hasMany(tbl_room_ed::class, 'room_id', 'room_id');
    }
    public function building()
    {
        return $this->hasOne(tbl_building::class, 'building_id', 'building_id');
    }
}
