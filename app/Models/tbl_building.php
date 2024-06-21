<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_building extends Model
{
    use HasFactory;
    protected $table = 'tbl_building';
    protected $primaryKey = 'building_id';

    protected $fillable = [
        'building_name',
    ];
}
