<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Prefabricado;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $materiales = Material::all();
        $prefabricados = Prefabricado::all();

        $maCount = count((array)$materiales);

        return view('home',compact('materiales','prefabricados','maCount'));
    }
}
