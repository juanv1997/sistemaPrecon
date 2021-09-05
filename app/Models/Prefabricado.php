<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefabricado extends Model
{
    use HasFactory;
    protected  $table="tbl_prefabricado";
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'pre_id';
}
