<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = "tbl_material";
    public $timestamps = false;
    protected $primaryKey = "material_id";
    protected $guarded = [];
    
}
