<?php

namespace App\Http\Livewire;

use App\Exports\FilterReportExport;
use App\Models\Entrada;
use App\Models\Material;
use App\Models\Prefabricado;
use App\Models\Salida;
use App\Models\TipoProducto;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AllTransactions extends Component
{

    protected $listeners = ['filter'=>'setParameters'];
    public $search;
    public $tipoProducto="Prefabricado";
    public $tipoTransaccion = "Entradas";
    public $producto = null;
    public $dateBegin;
    public $dateEnd;
    public $listItems = 0;
    public $dateIntervalToggle = 0;
    public $productoToggle = 0;
    public $stringResult = "hola";
    

    public function setParameters($parameters){

        $this->tipoProducto = $parameters["tipo"];
        $this->tipoTransaccion = $parameters["transaccion"];
        $this->producto = $parameters["producto"];
        $this->dateBegin = $parameters["dateBegin"];
        $this->dateEnd = $parameters["dateEnd"];
        $this->dateIntervalToggle = $parameters["dateToggle"];
        $this->productoToggle = $parameters["productoToggle"];
    }

    public function filter(){

        $producto = "";

        if($this->productoToggle==1 && $this->dateIntervalToggle==1){

            switch ($this->tipoTransaccion) {
                case "Entradas":

                        switch ($this->tipoProducto) {
                            case "Prefabricado":
                               
                                $this->listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                                   ->where('tbl_entrada.entrada_fecha',">=",$this->dateBegin)
                                                   ->where('tbl_entrada.entrada_fecha',"<=",$this->dateEnd)
                                                   ->where('tbl_entrada.pre_id',$this->producto)
                                                   ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                   ->get();
                                                   $producto = Prefabricado::find($this->producto);
                                                   $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $producto->pre_descripcion.
                                                                                                     " entre ".$this->dateBegin." y ".
                                                                                                     $this->dateEnd;

                                break;
                            
                            case "Material":

                                $this->listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                            ->where('tbl_entrada.entrada_fecha',">=",$this->dateBegin)
                                                            ->where('tbl_entrada.entrada_fecha',"<=",$this->dateEnd)
                                                            ->where('tbl_entrada.material_id',$this->producto)
                                                            ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                            ->get();
                                                            $producto = Material::find($this->producto);
                                                            $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $producto->material_descrip.
                                                                                                     " entre ".$this->dateBegin." y ".
                                                                                                     $this->dateEnd;

                                break;
                        }

                    break;
                
                case "Salidas":

                    switch ($this->tipoProducto) {
                        case "Prefabricado":
                            
                            $this->listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                                        ->where('tbl_salida.salida_fecha',">=",$this->dateBegin)
                                                        ->where('tbl_salida.salida_fecha',"<=",$this->dateEnd)
                                                        ->where('tbl_salida.pre_id',$this->producto)
                                                        ->orderBy('tbl_salida.salida_fecha','desc')
                                                        ->get();
                                                        $producto = Prefabricado::find($this->producto);
                                                        $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $producto->pre_descripcion.
                                                                                                     " entre ".$this->dateBegin." y ".
                                                                                                     $this->dateEnd;

                            break;
                        
                        case "Material":
                            $this->listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                        ->where('tbl_salida.salida_fecha',">=",$this->dateBegin)
                                                        ->where('tbl_salida.salida_fecha',"<=",$this->dateEnd)
                                                        ->where('tbl_salida.material_id',$this->producto)
                                                        ->orderBy('tbl_salida.salida_fecha','desc')
                                                        ->get();
                                                        $producto = Material::find($this->producto);
                                                        $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $producto->material_descrip.
                                                                                                     " entre ".$this->dateBegin." y ".
                                                                                                     $this->dateEnd;
                            break;
                    }

                    break;
            } 
            
            

        }   
        elseif ($this->productoToggle==1 ) {

            switch ($this->tipoTransaccion) {
                case "Entradas":

                        switch ($this->tipoProducto) {
                            case "Prefabricado":

                                $this->listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                                   ->where('tbl_entrada.pre_id',$this->producto)
                                                   ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                   ->get();
                                                   $producto = Prefabricado::find($this->producto);
                                                   $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $producto->pre_descripcion;
                                                   

                                break;
                            
                            case "Material":

                                $this->listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                   ->where('tbl_entrada.material_id',$this->producto)
                                                   ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                   ->get();
                                                   $producto = Material::find($this->producto);
                                                   $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $producto->material_descrip;

                                break;
                        }

                    break;
                
                case "Salidas":

                    switch ($this->tipoProducto) {
                        case "Prefabricado":
                            
                            $this->listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                                    ->where('tbl_salida.pre_id',$this->producto)
                                                    ->orderBy('tbl_salida.salida_fecha','desc')
                                                    ->get();
                            $producto = Prefabricado::find($this->producto);
                            $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $producto->pre_descripcion;
                            
                            

                            break;
                        
                        case "Material":
                            $this->listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                   ->where('tbl_salida.material_id',$this->producto)
                                                   ->orderBy('tbl_salida.salida_fecha','desc')
                                                   ->get();
                                                   $producto = Material::find($this->producto);
                                                   $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $producto->material_descrip;
                            break;
                    }

                    break;
            }
            
        }
        elseif ($this->dateIntervalToggle==1) {

            $this->emit('fecha');

            switch ($this->tipoTransaccion) {
                case "Entradas":

                        switch ($this->tipoProducto) {
                            case "Prefabricado":

                                $this->listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                                   ->where('tbl_entrada.entrada_fecha',">=",$this->dateBegin)
                                                   ->where('tbl_entrada.entrada_fecha',"<=",$this->dateEnd)
                                                   ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                   ->get();
                                                   $producto = Prefabricado::find($this->producto);
                                                   $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $this->tipoProducto.
                                                                                                     " entre ".$this->dateBegin." y ".
                                                                                                     $this->dateEnd;

                                break;
                            
                            case "Material":

                                $this->listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                            ->where('tbl_entrada.entrada_fecha',">=",$this->dateBegin)
                                                            ->where('tbl_entrada.entrada_fecha',"<=",$this->dateEnd)
                                                            ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                            ->get();
                                                            $producto = Material::find($this->producto);
                                                            $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                    $this->tipoProducto.
                                                                                                     " entre ".$this->dateBegin." y ".
                                                                                                     $this->dateEnd;

                                break;
                        }

                    break;
                
                case "Salidas":

                    switch ($this->tipoProducto) {
                        case "Prefabricado":
                            
                            $this->listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                                        ->where('tbl_salida.salida_fecha',">=",$this->dateBegin)
                                                        ->where('tbl_salida.salida_fecha',"<=",$this->dateEnd)
                                                        ->orderBy('tbl_salida.salida_fecha','desc')
                                                        ->get();
                                                        $producto = Prefabricado::find($this->producto);
                                                        $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $this->tipoProducto.
                                                                                                     " entre ".$this->dateBegin." y ".
                                                                                                     $this->dateEnd;

                            break;
                        
                        case "Material":
                            $this->listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                        ->where('tbl_salida.salida_fecha',">=",$this->dateBegin)
                                                        ->where('tbl_salida.salida_fecha',"<=",$this->dateEnd)
                                                        ->orderBy('tbl_salida.salida_fecha','desc')
                                                        ->get();
                                                        $producto = Material::find($this->producto);
                                                        $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                $this->tipoProducto.
                                                                                                 " entre ".$this->dateBegin." y ".
                                                                                                 $this->dateEnd;
                            break;
                    }

                    break;
            } 

            
        }
        else{

            switch ($this->tipoTransaccion) {
                case "Entradas":

                        switch ($this->tipoProducto) {
                            case "Prefabricado":

                                $this->listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                                            ->where('tbl_prefabricado.pre_status','=','A')
                                                            ->orderBy('tbl_entrada.entrada_fecha','desc')
                                                            ->get();
                                                   $producto = Prefabricado::find($this->producto);
                                                   $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                     $this->tipoProducto;
                                

                                break;
                            
                            case "Material":

                                $this->listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                            ->where('tbl_material.material_status','=','A')
                                                            ->orderBy('tbl_entrada.entrada_fecha','desc')    
                                                            ->get();
                                                   $producto = Material::find($this->producto);
                                                   $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                  $this->tipoProducto;

                                break;
                        }

                    break;
                
                case "Salidas":

                    switch ($this->tipoProducto) {
                        case "Prefabricado":
                            $this->listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                                        ->orderBy('tbl_salida.salida_fecha','desc')
                                                        ->where('tbl_prefabricado.pre_status','=','A')
                                                        ->get();
                            $producto = Prefabricado::find($this->producto);
                            $this->stringResult = $this->tipoTransaccion." de ".
                                                                                $this->tipoProducto;
                            break;
                        
                        case "Material":
                            $this->listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                    ->orderBy('tbl_salida.salida_fecha','desc')
                                                    ->where('tbl_material.material_status','=','A')
                                                    ->get();
                                                   $producto = Material::find($this->producto);
                                                   $this->stringResult = $this->tipoTransaccion." de ".
                                                                                                  $this->tipoProducto;
                            break;
                    }

                    break;
            }

        }
    }

    public function createReport(){

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


        $time = $hours."h".$minutes."m".$seconds."s";

        $date = date("Y-m-d");

        $fileName = $this->stringResult."_".$date."_".$time.".xlsx";

        return Excel::download(new FilterReportExport(

                                                        $this->tipoProducto,
                                                        $this->tipoTransaccion,
                                                        $this->producto,
                                                        $this->dateBegin,
                                                        $this->dateEnd,
                                                        $this->dateIntervalToggle,
                                                        $this->productoToggle

                                                      ),$fileName);

    }

    public function render()
    {       
        $this->filter();

        return view('livewire.all-transactions');
    }
}
