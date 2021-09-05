<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capa extends Model
{
    use HasFactory;
    protected $table="tbl_capa";
    public $timestamps = false;
    protected $primaryKey = 'capa_id';
    public $guarded = [];
}
