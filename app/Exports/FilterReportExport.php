<?php

namespace App\Exports;

use App\Models\Entrada;
use App\Models\Salida;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FilterReportExport implements FromCollection,WithHeadings
{

    private $tipoProducto;
    private $tipoTransaccion;
    private $producto;
    private $dateBegin;
    private $dateEnd;
    private $listItems;
    private $dateIntervalToggle = 0;
    private $productoToggle = 0;
    

    public function __construct($tipoProducto,$tipoTransaccion,
                                $producto,$dateBegin,$dateEnd,
                                $dateIntervalToggle,$productoToggle) 
    {
        
        $this->tipoProducto = $tipoProducto;
        $this->tipoTransaccion = $tipoTransaccion;
        $this->producto = $producto;
        $this->dateBegin = $dateBegin;
        $this->dateEnd = $dateEnd;
        $this->dateIntervalToggle = $dateIntervalToggle;
        $this->productoToggle = $productoToggle;

    }

    public function headings():array{

        return [

            'Código',
            'Descripción',
            'Precio unitario',
            'Cantidad',
            'Total',
            'Fecha',
            'Hora'
        ];

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection(){
     
    if($this->productoToggle==1 && $this->dateIntervalToggle==1){

        switch ($this->tipoTransaccion) {
            case "Entradas":

                    switch ($this->tipoProducto) {
                        case "Prefabricado":

                            $this->listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                               ->where('tbl_entrada.entrada_fecha',">=",$this->dateBegin)
                                               ->where('tbl_entrada.entrada_fecha',"<=",$this->dateEnd)
                                               ->where('tbl_entrada.pre_id',$this->producto)
                                               ->select('tbl_prefabricado.pre_codigo', 'tbl_prefabricado.pre_descripcion',
                                                        'tbl_prefabricado.pre_precio','tbl_entrada.entrada_cantidad',
                                                        'tbl_entrada.entrada_total','tbl_entrada.entrada_fecha',
                                                        'tbl_entrada.entrada_hora_creacion')->get();
                                               

                            break;
                        
                        case "Material":

                            $this->listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                        ->where('tbl_entrada.entrada_fecha',">=",$this->dateBegin)
                                                        ->where('tbl_entrada.entrada_fecha',"<=",$this->dateEnd)
                                                        ->where('tbl_entrada.material_id',$this->producto)
                                                        ->select('tbl_material.material_cod', 'tbl_material.material_descrip',
                                                        'tbl_material.material_precio','tbl_entrada.entrada_cantidad',
                                                        'tbl_entrada.entrada_total','tbl_entrada.entrada_fecha',
                                                        'tbl_entrada.entrada_hora_creacion')->get();
                                                        

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
                                                    ->select('tbl_prefabricado.pre_codigo', 'tbl_prefabricado.pre_descripcion',
                                                        'tbl_prefabricado.pre_precio','tbl_salida.salida_cantidad',
                                                        'tbl_salida.salida_total','tbl_salida.salida_fecha',
                                                        'tbl_salida.salida_hora_creacion')->get();
                                                    

                        break;
                    
                    case "Material":
                        $this->listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                    ->where('tbl_salida.salida_fecha',">=",$this->dateBegin)
                                                    ->where('tbl_salida.salida_fecha',"<=",$this->dateEnd)
                                                    ->where('tbl_salida.material_id',$this->producto)
                                                    ->select('tbl_material.material_cod', 'tbl_material.material_descrip',
                                                    'tbl_material.material_precio','tbl_salida.salida_cantidad',
                                                    'tbl_salida.salida_total','tbl_salida.salida_fecha',
                                                    'tbl_salida.salida_hora_creacion')->get();
                                                    
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
                                                   ->where('tbl_entrada.pre_id',$this->producto)->select('tbl_prefabricado.pre_codigo', 'tbl_prefabricado.pre_descripcion',
                                                   'tbl_prefabricado.pre_precio','tbl_entrada.entrada_cantidad',
                                                   'tbl_entrada.entrada_total','tbl_entrada.entrada_fecha',
                                                   'tbl_entrada.entrada_hora_creacion')->get();

                                break;
                            
                            case "Material":

                                $this->listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                   ->where('tbl_entrada.material_id',$this->producto) ->select('tbl_material.material_cod', 'tbl_material.material_descrip',
                                                   'tbl_material.material_precio','tbl_entrada.entrada_cantidad',
                                                   'tbl_entrada.entrada_total','tbl_entrada.entrada_fecha',
                                                   'tbl_entrada.entrada_hora_creacion')->get();

                                break;
                        }

                    break;
                
                case "Salidas":

                    switch ($this->tipoProducto) {
                        case "Prefabricado":
                            
                            $this->listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                            ->where('tbl_salida.pre_id',$this->producto) ->select('tbl_prefabricado.pre_codigo', 'tbl_prefabricado.pre_descripcion',
                            'tbl_prefabricado.pre_precio','tbl_salida.salida_cantidad',
                            'tbl_salida.salida_total','tbl_salida.salida_fecha',
                            'tbl_salida.salida_hora_creacion')->get();

                            break;
                        
                        case "Material":
                            $this->listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                   ->where('tbl_salida.material_id',$this->producto)->select('tbl_material.material_cod', 'tbl_material.material_descrip',
                                                   'tbl_material.material_precio','tbl_salida.salida_cantidad',
                                                   'tbl_salida.salida_total','tbl_salida.salida_fecha',
                                                   'tbl_salida.salida_hora_creacion')->get();
                            break;
                    }

                    break;
            }
            
        }
        elseif ($this->dateIntervalToggle==1) {

            switch ($this->tipoTransaccion) {
                case "Entradas":

                        switch ($this->tipoProducto) {
                            case "Prefabricado":

                                $this->listItems = Entrada::join('tbl_prefabricado','tbl_entrada.pre_id','=','tbl_prefabricado.pre_id')
                                                   ->where('tbl_entrada.entrada_fecha',">=",$this->dateBegin)
                                                   ->where('tbl_entrada.entrada_fecha',"<=",$this->dateEnd)
                                                   ->select('tbl_prefabricado.pre_codigo', 'tbl_prefabricado.pre_descripcion',
                                                        'tbl_prefabricado.pre_precio','tbl_entrada.entrada_cantidad',
                                                        'tbl_entrada.entrada_total','tbl_entrada.entrada_fecha',
                                                        'tbl_entrada.entrada_hora_creacion')->get();

                                break;
                            
                            case "Material":

                                $this->listItems = Entrada::join('tbl_material','tbl_entrada.material_id','=','tbl_material.material_id')
                                                            ->where('tbl_entrada.entrada_fecha',">=",$this->dateBegin)
                                                            ->where('tbl_entrada.entrada_fecha',"<=",$this->dateEnd)
                                                            ->select('tbl_material.material_cod', 'tbl_material.material_descrip',
                                                        'tbl_material.material_precio','tbl_entrada.entrada_cantidad',
                                                        'tbl_entrada.entrada_total','tbl_entrada.entrada_fecha',
                                                        'tbl_entrada.entrada_hora_creacion')->get();
                                break;
                        }

                    break;
                
                case "Salidas":

                    switch ($this->tipoProducto) {
                        case "Prefabricado":
                            
                            $this->listItems = Salida::join('tbl_prefabricado','tbl_salida.pre_id','=','tbl_prefabricado.pre_id')
                                                        ->where('tbl_salida.salida_fecha',">=",$this->dateBegin)
                                                        ->where('tbl_salida.salida_fecha',"<=",$this->dateEnd)
                                                        ->select('tbl_prefabricado.pre_codigo', 'tbl_prefabricado.pre_descripcion',
                                                        'tbl_prefabricado.pre_precio','tbl_salida.salida_cantidad',
                                                        'tbl_salida.salida_total','tbl_salida.salida_fecha',
                                                        'tbl_salida.salida_hora_creacion')->get();

                            break;
                        
                        case "Material":
                            $this->listItems = Salida::join('tbl_material','tbl_salida.material_id','=','tbl_material.material_id')
                                                        ->where('tbl_salida.salida_fecha',">=",$this->dateBegin)
                                                        ->where('tbl_salida.salida_fecha',"<=",$this->dateEnd)
                                                        ->select('tbl_material.material_cod', 'tbl_material.material_descrip',
                                                        'tbl_material.material_precio','tbl_salida.salida_cantidad',
                                                        'tbl_salida.salida_total','tbl_salida.salida_fecha',
                                                        'tbl_salida.salida_hora_creacion')->get();
                            break;
                    }

                    break;
            } 

            
        }


        return $this->listItems;
    }
}
