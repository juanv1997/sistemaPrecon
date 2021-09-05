<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resistencia extends Model
{
    use HasFactory;
    protected $table='tbl_resistencia';
    public $timestamps = false;
    protected $primaryKey = 'resistencia_id';
    public $guarded = [];
}
