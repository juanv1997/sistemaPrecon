<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;
    protected $table='tbl_dimension';
    public $timestamps = false;
    protected $primaryKey = 'dimension_id';
    public $guarded = [];
}
