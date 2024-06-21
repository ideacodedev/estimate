<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_ed extends Model
{
    use HasFactory;
    protected $table = 'tbl_ed';
    protected $primaryKey = 'ed_id';

    protected $fillable = [
        'ed_device',
        'ed_type_id',
    ];
    public function ed_type()
    {
        return $this->hasOne(tbl_ed_type::class,'ed_type_id','ed_type_id');
    }
}
