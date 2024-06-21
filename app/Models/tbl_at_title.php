<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_at_title extends Model
{
    use HasFactory;
    protected $table = 'tbl_at_title';
    protected $primaryKey = 'at_title_id';

    protected $fillable = [
        'at_title_text',
    ];
}
