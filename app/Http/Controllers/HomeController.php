<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Prefabricado;
use Illuminate\Http\Request;

use function PHPUnit\Framework\countOf;

class DashboardController extends Controller
{
    public function index()
    {
        // $materiales = Material::join('tbl_unidad','tbl_material.unidad_id','=','tbl_unidad.unidad_id')
        //                     ->join('tbl_tipo','tbl_material.tipo_id','=','tbl_tipo.tipo_id');
        $materiales = Material::all();
        $prefabricados = Prefabricado::all();

        $maCount = count((array)$materiales);

        return view('home',compact('materiales','prefabricados','maCount'));
    }

   
}
