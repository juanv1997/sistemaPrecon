<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $table = "tbl_entrada";
    public $timestamps = false;
    protected $primaryKey = 'entrada_id';
    protected $guarded = [];
}
