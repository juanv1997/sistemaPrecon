<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $table='tbl_unidad';
    public $timestamps = false;
    protected $primaryKey = 'unidad_id';
    public $guarded = [];
}
