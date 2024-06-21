<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_ed_type extends Model
{
    use HasFactory;
    protected $table = 'tbl_ed_type';
    protected $primaryKey = 'ed_type_id';

    protected $fillable = [
        'ed_type_name',
    ];
    public function ed()
    {
        return $this->hasMany(tbl_ed::class,'ed_type_id','ed_type_id');
    }
}
