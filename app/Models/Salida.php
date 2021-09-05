<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;
    protected $table = "tbl_salida";
    public $timestamps = false;
    protected $primaryKey = 'salida_id';
    protected $guarded = [];
}
