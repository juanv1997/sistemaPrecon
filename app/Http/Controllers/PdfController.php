<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Material;
use App\Models\Prefabricado;
use App\Models\Salida;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function createPrePdf($action){

        $date = date('Y-m-d');
        $time = $this->getHour();

        $prefabricados = Prefabricado::join('tbl_capa','tbl_prefabricado.capa_id','=','tbl_capa.capa_id')
                            ->join('tbl_color','tbl_prefabricado.color_id','=','tbl_color.color_id')
                            ->join('tbl_dimension','tbl_prefabricado.dimension_id','=','tbl_dimension.dimension_id')
                            ->join('tbl_espesor','tbl_prefabricado.espesor_id','=','tbl_espesor.espesor_id')
                            ->join('tbl_resistencia','tbl_prefabricado.resistencia_id','=','tbl_resistencia.resistencia_id')
                            ->join('tbl_tipo','tbl_prefabricado.tipo_id','=','tbl_tipo.tipo_id')
                            ->join('tbl_unidad','tbl_prefabricado.unidad_id','=','tbl_unidad.unidad_id')
                            ->orderBy('pre_id','desc')
                            ->get();

        $pdf = PDF::loadView('pdf.prefabricados',compact('prefabricados','date','time') );

        $pdf->setPaper('a4', 'landscape');

        if($action == "download"){

            return $pdf->download('prefabricados.pdf');

        } else

            return $pdf->stream();    
    }

    public function createMaterialPdf($action){

        $date = date('Y-m-d');
        $time = $this->getHour();

        $materiales= Material::join('tbl_unidad','tbl_material.unidad_id','=','tbl_unidad.unidad_id')
                        ->join('tbl_tipo','tbl_material.tipo_id','=','tbl_tipo.tipo_id')
                        ->orderBy('material_id','desc')
                        ->get();

        $pdf = PDF::loadView('pdf.materiales',compact('materiales','date','time') );

        $pdf->setPaper('a4', 'landscape');

        if($action == "download"){

            return $pdf->download('materiales.pdf');

        } else

            return $pdf->stream(); 
    }

    public function createTransaccionPdf($action , Request $request){
        
        $date = date('Y-m-d');

        $time = $this->getHour();

        $dateIntervalToggle = false;

        $productoToggle = false;

        $parameters = $request->all();

        $productoId = null;

        $listItems = null;

        $tipoTransaccion = $parameters['transaccion'];

        $tipoProducto = $parameters['tipo'];

        $dateIsSet = $parameters['dateIsSet'];

        $productoIsSet = $parameters['productoIsSet'];

        $stringResult = ""; 


        if($dateIsSet == 1){

            $dateBegin = $parameters['dateBegin'];

            $dateEnd = $parameters['dateEnd'];


        }

        if ($productoIsSet == 1) {
            
            $productoId = $parameters['productoId'];


        }
                

        if ($dateIsSet == 1 && $productoIsSet == 1) {

                switch ($tipoTransaccion) {
                    case "Entradas":
    
                            switch ($tipoProducto) {
                                case "Prefabricado":
                                   
                                    $listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                                       ->where('tbl_entrada.entrada_fecha',">=",$dateBegin)
                                                       ->where('tbl_entrada.entrada_fecha',"<=",$dateEnd)
                                                       ->where('tbl_entrada.pre_id',$productoId)
                                                       ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                       ->get();
                                                       $producto = Prefabricado::find($productoId);
                                                       $stringResult = $tipoTransaccion." de ".
                                                                                                         $producto->pre_descripcion.
                                                                                                         " entre ".$dateBegin." y ".
                                                                                                         $dateEnd;
    
                                    break;
                                
                                case "Material":
    
                                    $listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                                ->where('tbl_entrada.entrada_fecha',">=",$dateBegin)
                                                                ->where('tbl_entrada.entrada_fecha',"<=",$dateEnd)
                                                                ->where('tbl_entrada.material_id',$productoId)
                                                                ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                                ->get();
                                                                $producto = Material::find($productoId);
                                                                $stringResult = $tipoTransaccion." de ".
                                                                                                         $producto->material_descrip.
                                                                                                         " entre ".$dateBegin." y ".
                                                                                                         $dateEnd;
    
                                    break;
                            }
    
                        break;
                    
                    case "Salidas":
    
                        switch ($tipoProducto) {
                            case "Prefabricado":
                                
                                $listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                                            ->where('tbl_salida.salida_fecha',">=",$dateBegin)
                                                            ->where('tbl_salida.salida_fecha',"<=",$dateEnd)
                                                            ->where('tbl_salida.pre_id',$productoId)
                                                            ->orderBy('tbl_salida.salida_fecha','desc')
                                                            ->get();
                                                            $producto = Prefabricado::find($productoId);
                                                            $stringResult = $tipoTransaccion." de ".
                                                                                                         $producto->pre_descripcion.
                                                                                                         " entre ".$dateBegin." y ".
                                                                                                         $dateEnd;
    
                                break;
                            
                            case "Material":
                                $listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                            ->where('tbl_salida.salida_fecha',">=",$dateBegin)
                                                            ->where('tbl_salida.salida_fecha',"<=",$dateEnd)
                                                            ->where('tbl_salida.material_id',$productoId)
                                                            ->orderBy('tbl_salida.salida_fecha','desc')
                                                            ->get();
                                                            $producto = Material::find($productoId);
                                                            $stringResult = $tipoTransaccion." de ".
                                                                                                         $producto->material_descrip.
                                                                                                         " entre ".$dateBegin." y ".
                                                                                                         $dateEnd;
                                break;
                        }
    
                        break;
                }  

        }elseif ($productoIsSet == 1) {

            switch ($tipoTransaccion) {
                case "Entradas":

                        switch ($tipoProducto) {
                            case "Prefabricado":

                                $listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                                   ->where('tbl_entrada.pre_id',$productoId)
                                                   ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                   ->get();
                                                   $producto = Prefabricado::find($productoId);
                                                   $stringResult = $tipoTransaccion." de ".$producto->pre_descripcion;
                                                   

                                break;
                            
                            case "Material":

                                $listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                   ->where('tbl_entrada.material_id',$productoId)
                                                   ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                   ->get();
                                                   $producto = Material::find($productoId);
                                                   $stringResult = $tipoTransaccion." de ".$producto->material_descrip;

                                break;
                        }

                    break;
                
                case "Salidas":

                    switch ($tipoProducto) {
                        case "Prefabricado":
                            
                            $listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                                    ->where('tbl_salida.pre_id',$productoId)
                                                    ->orderBy('tbl_salida.salida_fecha','desc')
                                                    ->get();
                            $producto = Prefabricado::find($productoId);
                            $stringResult = $tipoTransaccion." de ".$producto->pre_descripcion;
                            
                            

                            break;
                        
                        case "Material":
                            $listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                   ->where('tbl_salida.material_id',$productoId)
                                                   ->orderBy('tbl_salida.salida_fecha','desc')
                                                   ->get();
                                                   $producto = Material::find($productoId);
                                                   $stringResult = $tipoTransaccion." de ".$producto->material_descrip;
                            break;
                    }

                    break;
            }
            
        }elseif ($dateIsSet == 1) {


            switch ($tipoTransaccion) {
                case "Entradas":

                        switch ($tipoProducto) {
                            case "Prefabricado":

                                $listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                                   ->where('tbl_entrada.entrada_fecha',">=",$dateBegin)
                                                   ->where('tbl_entrada.entrada_fecha',"<=",$dateEnd)
                                                   ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                   ->get();
                                                  
                                                   $stringResult = $tipoTransaccion." de ".
                                                                                                     $tipoProducto.
                                                                                                     " entre ".$dateBegin." y ".
                                                                                                     $dateEnd;

                                break;
                            
                            case "Material":

                                $listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                            ->where('tbl_entrada.entrada_fecha',">=",$dateBegin)
                                                            ->where('tbl_entrada.entrada_fecha',"<=",$dateEnd)
                                                            ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                            ->get();
                                                            
                                                            $stringResult = $tipoTransaccion." de ".
                                                                                                    $tipoProducto.
                                                                                                     " entre ".$dateBegin." y ".
                                                                                                     $dateEnd;

                                break;
                        }

                    break;
                
                case "Salidas":

                    switch ($tipoProducto) {
                        case "Prefabricado":
                            
                            $listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                                        ->where('tbl_salida.salida_fecha',">=",$dateBegin)
                                                        ->where('tbl_salida.salida_fecha',"<=",$dateEnd)
                                                        ->orderBy('tbl_salida.salida_fecha','desc')
                                                        ->get();
                                                        
                                                        $stringResult = $tipoTransaccion." de ".
                                                                                                     $tipoProducto.
                                                                                                     " entre ".$dateBegin." y ".
                                                                                                     $dateEnd;

                            break;
                        
                        case "Material":
                            $listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                        ->where('tbl_salida.salida_fecha',">=",$dateBegin)
                                                        ->where('tbl_salida.salida_fecha',"<=",$dateEnd)
                                                        ->orderBy('tbl_salida.salida_fecha','desc')
                                                        ->get();
                                                        
                                                        $stringResult = $tipoTransaccion." de ".
                                                                                                $tipoProducto.
                                                                                                 " entre ".$dateBegin." y ".
                                                                                                 $dateEnd;
                            break;
                    }

                    break;
            } 

            
        }

        
        $pdf = PDF::loadView('pdf.transaccion',compact('listItems','tipoProducto','stringResult','tipoTransaccion','date','time'));

        $pdf->setPaper('a4', 'landscape');

        if($action == "download"){

            return $pdf->download($stringResult.'.pdf');

        } else

            return $pdf->stream(); 
       

    }

    public function getHour(){

        date_default_timezone_set("America/Lima");

        $dateToTime = getdate();

        foreach ($dateToTime as $key => $value) {
            
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


        $time = $hours.":".$minutes.":".$seconds;

        return $time;
    }
}
