<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table='tbl_color';
    public $timestamps = false;
    protected $primaryKey = 'color_id';
    protected $guarded = [];
    
}
