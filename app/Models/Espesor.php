<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espesor extends Model
{
    use HasFactory;
    protected $table='tbl_espesor';
    public $timestamps = false;
    protected $primaryKey = 'espesor_id';
    public $guarded = [];
}
