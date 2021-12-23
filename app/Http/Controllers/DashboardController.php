<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Material;
use App\Models\Prefabricado;
use App\Models\Salida;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        date_default_timezone_set("America/Lima");

        $materiales = Material::all();
        $prefabricados = Prefabricado::all();
        $date = getdate();

         foreach ($date as $key => $value) {
            
             if($key=="seconds"){
                $seconds = $value;
             }
             if ($key=="minutes") {
                $minutes = $value;
             }
             if ( $key=="hours") {
                $hours = $value;
             }
         }

         foreach ($date as $key => $value) {
            
            if($key=="weekday"){
                $weekday = $value;
               $day = $value;
            }
            if ($key=="month") {
               $month = $value;
            }
            if ( $key=="year") {
               $year = $value;
            }
            if ( $key=="mday") {
                $numberDay = $value;
             }
        }

        $time = $hours." : ".$minutes." : ".$seconds;

        $date = $day." ".$numberDay." de ".$month." del ".$year;

        $entradasPre = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                   ->where('tbl_entrada.entrada_fecha',"=",date("Y-m-d"))
                                   ->get();
                        
        $entradasMaterial = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                    ->where('tbl_entrada.entrada_fecha',"=",date("Y-m-d"))
                                    ->get();
                                    
                                            
        $salidasPre = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                    ->where('tbl_salida.salida_fecha',"=",date("Y-m-d"))
                                    ->get();
                                               
                
                                       
        $salidasMaterial = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                    ->where('tbl_salida.salida_fecha',"=",date("Y-m-d"))
                                    ->get();
                                                                       
                                            
                                    
                                        
        $maCount = count((array)$materiales);

        return view('home',compact('materiales','prefabricados','maCount',
                                  'entradasPre','entradasMaterial','date',
                                  'salidasPre','salidasMaterial'));
    }
}
