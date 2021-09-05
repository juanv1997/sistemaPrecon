<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;
    protected $table = "tbl_tipo_producto";
    public $timestamps = false;
    protected $primaryKey = 'tipo_pro_id';
    public $guarded = [];

}
