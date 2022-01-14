<?php

namespace App\Http\Livewire;

use App\Models\Capa;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Espesor;
use App\Models\Prefabricado;
use App\Models\Resistencia;
use App\Models\Tipo;
use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithFileUploads;
use Ramsey\Uuid\Type\Time;
use Barryvdh\DomPDF\Facade as PDF;


class AddPre extends Component
{
    use WithFileUploads;

    public $openModal = false;
    public Prefabricado $pre;
    public $image;
    public $listeners = ['featureAdded'=>'render','reset'=>'resetSelect','checkSetParameters'];
    public $codigo;
    public $codigoOriginal;
    public $descripOriginal;
    public $descrip;
    
    public function mount(Prefabricado $prefabricado){

        $this->pre = $prefabricado;

    }

    protected $rules = [

        'pre.capa_id'=>'required',
        'pre.color_id'=>'required',
        'pre.dimension_id'=>'required',
        'pre.espesor_id'=>'required',
        'pre.resistencia_id'=>'required',
        'pre.tipo_id'=>'required',
        'pre.unidad_id'=>'required',
        'pre.pre_observacion'=>'required|max:120',
        'pre.pre_precio'=>'required|max:10000|numeric|min:1',
        'pre.pre_stock'=>'required|max:10000|numeric|min:1',    
        'image' => 'required',
    ];

    protected $messages = [

        'pre.pre_precio.required' => 'Dede ingresar un valor en el precio',
        'pre.capa_id.required'=>'Debe seleccionar una capa',
        'pre.color_id.required'=>'Debe seleccionar un color',
        'pre.dimension_id.required'=>'Debe seleccionar una dimension',
        'pre.espesor_id.required'=>'Debe seleccionar una espesor',
        'pre.resistencia_id.required'=>'Debe seleccionar una resistencia',
        'pre.tipo_id.required'=>'Debe seleccionar un tipo',
        'pre.unidad_id.required'=>'Debe seleccionar una unidad',
        'pre.pre_observacion.required'=>'Debe ingresar una observacion',
        'pre.pre_precio.required'=>'Debe ingresar un precio',
        'pre.pre_stock.required'=>'Debe ingresar un stock',
        'image.required' => 'Debe seleccionar una imagen',
        'pre.pre_stock.max'=>'Solo se puede ingresar un valor maximo 10000',
        'pre.pre_precio.max'=>'Solo se puede ingresar un valor maximo 10000',
        'pre.pre_stock.min'=>'Se debe ingresar un valor mayor a 0',
        'pre.pre_precio.min'=>'Se debe ingresar un valor mayor a 0',
        'pre.pre_observacion.max'=>'Solo se puede ingresar una observacion de maximo 120 caracteres',


    ];

    public function resetSelect($selectId){

        switch ($selectId) {

            case 'cbTipo':

                $this->pre->tipo_id = null;

                break;
            case 'cbColor':

                $this->pre->color_id = null;
    
                break;
            case 'cbEspesor':

                $this->pre->espesor_id = null;
    
                break;
            case 'cbResistencia':

                $this->pre->resistencia_id = null;
    
                break;
            case 'cbDimension':

                $this->pre->dimension_id = null;
    
                break;    
            case 'cbCapa':

                $this->pre->capa_id = null;
        
                break;
            case 'cbUnidad':

                $this->pre->unidad_id = null;
            
                break;
        }

    }

    public function addPrefabricado(){

        $this->validate();
        
        date_default_timezone_set("America/Lima");

        // $tipo = Tipo::find($this->pre->tipo_id);
        // $espesor = Espesor::find($this->pre->espesor_id);
        // $color = Color::find($this->pre->color_id);
        // $resistencia = Resistencia::find($this->pre->resistencia_id);
        // $capa = Capa::find($this->pre->capa_id);
        // $codigo = null;
        // $descrip = null;

            // if($tipo->tipo_nombre =="Bloq"){

          
            //     if($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A"){
    
            //         $codigo = "BLOQ".$espesor->espesor_cantidad."-".$color->color_inicial;
            //         $descrip = "Bloq"." "."E"."=".$espesor->espesor_cantidad." ".$color->color_nombre;
    
            //     }
            //     else{
    
            //         if($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A"){
    
            //             $codigo = "BLOQ".$espesor->espesor_cantidad;
            //             $descrip = "Bloq"." "."E"."=".$espesor->espesor_cantidad;
        
            //         }
            //         else{
            //                 $codigo = "BLOQ"."-".$color->color_inicial;
            //                 $descrip = "Bloq"." ".$color->color_nombre;
            //             }
            //     }
    
    
            // }
            // else{
    
            //     $tipoPre = substr($tipo->tipo_nombre,4);
                
            //     if($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre!="N/A"){
    
            //         $subTipoCod = strtoupper($tipoPre);
            //         $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad."-".$color->color_inicial."-".$capa->capa_nombre[0];
            //         $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;
                   
            //     }
            //     else{
    
            //         if($espesor->espesor_cantidad==0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre!="N/A"){
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod."-".$resistencia->resistencia_cantidad."-".$color->color_inicial."-".$capa->capa_nombre[0];
            //             $descrip = $tipo->tipo_nombre." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;
        
            //         }
            //         elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre!="N/A") {
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad."-".$capa->capa_nombre[0];
            //             $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$capa->capa_nombre;
    
            //         }
            //         elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre!="N/A") {
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$color->color_inicial."-".$capa->capa_nombre[0];
            //             $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;
    
            //         }
            //         elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre=="N/A") {
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad."-".$color->color_inicial;
            //             $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre;
    
            //         }
            //         if($espesor->espesor_cantidad==0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre!="N/A"){
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod."-".$resistencia->resistencia_cantidad."-".$capa->capa_nombre[0];
            //             $descrip = $tipo->tipo_nombre." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$capa->capa_nombre;
        
            //         }
            //         if($espesor->espesor_cantidad==0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre!="N/A"){
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod."-".$color->color_inicial."-".$capa->capa_nombre[0];
            //             $descrip = $tipo->tipo_nombre." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;
        
            //         }
            //         if($espesor->espesor_cantidad==0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre=="N/A"){
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod."-".$resistencia->resistencia_cantidad."-".$color->color_inicial;
            //             $descrip = $tipo->tipo_nombre." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre;
        
            //         }
            //         elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre!="N/A") {
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$capa->capa_nombre[0];
            //             $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"."MPA"." ".$capa->capa_nombre;
    
            //         }
            //         elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre=="N/A") {
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad;
            //             $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA";
    
            //         }
            //         elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre=="N/A") {
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$color->color_inicial;
            //             $descrip = $tipo->tipo_nombre." ".$color->color_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm";
    
            //         }
            //         elseif ($espesor->espesor_cantidad==0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre=="N/A") {
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod." ".$color->color_inicial;
            //             $descrip = $tipo->tipo_nombre." ".$color->color_nombre;
    
            //         }
            //         elseif ($espesor->espesor_cantidad==0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre=="N/A") {
    
            //              $subTipoCod = strtoupper($tipoPre);
            //              $codigo = $subTipoCod."-".$resistencia->resistencia_cantidad;
            //              $descrip = $tipo->tipo_nombre." "."R"."=".$resistencia->resistencia_cantidad;
    
            //         }
            //         elseif ($espesor->espesor_cantidad==0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre!="N/A") {
    
            //             $subTipoCod = strtoupper($tipoPre);
            //             $codigo = $subTipoCod."-".$capa->capa_nombre[0];
            //             $descrip = $tipo->tipo_nombre." ".$capa->capa_nombre;
    
            //        }
            //        elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre=="N/A") {
    
            //         $subTipoCod = strtoupper($tipoPre);
            //         $codigo = $subTipoCod.$espesor->espesor_cantidad;
            //         $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad;
            //     }
            //     elseif ($espesor->espesor_cantidad==0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre=="N/A") {
    
            //      $subTipoCod = strtoupper($tipoPre);
            //      $codigo = $subTipoCod;
            //      $descrip = $tipo->tipo_nombre;
                    
    
            //     }
                    
            //     }
    
    
               

           
            // }

             // $subTipoCod = strtoupper($tipoPre);
                // $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad."-".$color->color_inicial."-".$capa->capa_nombre[0];
                // $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;
            
            $sameProduct = $this->checkSameProduct($this->descrip, $this->codigo);
            
            if ($sameProduct) {
                    
                $this->emit('sameProduct');

            } else {

                $this->pre->pre_codigo = $this->codigo;
                $this->pre->pre_descripcion = $this->descrip;
                $this->pre->pre_importe = $this->pre->pre_stock*$this->pre->pre_precio; 
                $this->pre->pre_status = "A";
                $imageName = $this->pre->pre_descripcion."_".date('d-m-Y').".png";
                $imagePath = $this->image->storeAs('img/prefabricados',$imageName);
                $this->pre->pre_image_path = $imagePath;

            
                $this->pre->save();
            
                $prefa = new Prefabricado();
            
                $this->pre = $prefa;
        
                $this->emit('itemAdded');
                $this->emit('preAdded');
                $this->showBanner = true;
                
            }

       

    }

    public function checkSetParameters($fillParameters){
       
        if($this->pre->tipo_id && $this->pre->espesor_id && 
           $this->pre->color_id &&  $this->pre->resistencia_id && 
           $this->pre->capa_id ){            

            if($fillParameters){

                $this->fillMainParameters();

            }

            $this->emit('setParameters');
        }

    } 
    
    public function fillMainParameters(){

        $tipo = Tipo::find($this->pre->tipo_id);
        $espesor = Espesor::find($this->pre->espesor_id);
        $color = Color::find($this->pre->color_id);
        $resistencia = Resistencia::find($this->pre->resistencia_id);
        $capa = Capa::find($this->pre->capa_id);
        $codigo = null;
        $descrip = null;
        $tipoPre = substr($tipo->tipo_nombre,4);


        if($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre!="N/A"){
    
            $subTipoCod = strtoupper($tipoPre);
            $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad."-".$color->color_inicial."-".$capa->capa_nombre[0];
            $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;
           
        }
        else{

            if($espesor->espesor_cantidad==0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre!="N/A"){

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod."-".$resistencia->resistencia_cantidad."-".$color->color_inicial."-".$capa->capa_nombre[0];
                $descrip = $tipo->tipo_nombre." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;

            }
            elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre!="N/A") {

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad."-".$capa->capa_nombre[0];
                $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$capa->capa_nombre;

            }
            elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre!="N/A") {

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$color->color_inicial."-".$capa->capa_nombre[0];
                $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;

            }
            elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre=="N/A") {

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad."-".$color->color_inicial;
                $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre;

            }
            if($espesor->espesor_cantidad==0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre!="N/A"){

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod."-".$resistencia->resistencia_cantidad."-".$capa->capa_nombre[0];
                $descrip = $tipo->tipo_nombre." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$capa->capa_nombre;

            }
            if($espesor->espesor_cantidad==0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre!="N/A"){

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod."-".$color->color_inicial."-".$capa->capa_nombre[0];
                $descrip = $tipo->tipo_nombre." "."MPA"." ".$color->color_nombre." ".$capa->capa_nombre;

            }
            if($espesor->espesor_cantidad==0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre=="N/A"){

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod."-".$resistencia->resistencia_cantidad."-".$color->color_inicial;
                $descrip = $tipo->tipo_nombre." "."R"."=".$resistencia->resistencia_cantidad." "."MPA"." ".$color->color_nombre;

            }
            elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre!="N/A") {

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$capa->capa_nombre[0];
                $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"."MPA"." ".$capa->capa_nombre;

            }
            elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre=="N/A") {

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$resistencia->resistencia_cantidad;
                $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm"." "."R"."=".$resistencia->resistencia_cantidad." "."MPA";

            }
            elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre=="N/A") {

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod.$espesor->espesor_cantidad."-".$color->color_inicial;
                $descrip = $tipo->tipo_nombre." ".$color->color_nombre." "."E"."=".$espesor->espesor_cantidad." "."cm";

            }
            elseif ($espesor->espesor_cantidad==0 && $color->color_nombre!="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre=="N/A") {

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod." ".$color->color_inicial;
                $descrip = $tipo->tipo_nombre." ".$color->color_nombre;

            }
            elseif ($espesor->espesor_cantidad==0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad!=0 && $capa->capa_nombre=="N/A") {

                 $subTipoCod = strtoupper($tipoPre);
                 $codigo = $subTipoCod."-".$resistencia->resistencia_cantidad;
                 $descrip = $tipo->tipo_nombre." "."R"."=".$resistencia->resistencia_cantidad;

            }
            elseif ($espesor->espesor_cantidad==0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre!="N/A") {

                $subTipoCod = strtoupper($tipoPre);
                $codigo = $subTipoCod."-".$capa->capa_nombre[0];
                $descrip = $tipo->tipo_nombre." ".$capa->capa_nombre;

           }
           elseif ($espesor->espesor_cantidad!=0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre=="N/A") {

            $subTipoCod = strtoupper($tipoPre);
            $codigo = $subTipoCod.$espesor->espesor_cantidad;
            $descrip = $tipo->tipo_nombre." "."E"."=".$espesor->espesor_cantidad;
        }
        elseif ($espesor->espesor_cantidad==0 && $color->color_nombre=="N/A" && $resistencia->resistencia_cantidad==0 && $capa->capa_nombre=="N/A") {

         $subTipoCod = strtoupper($tipoPre);
         $codigo = $subTipoCod;
         $descrip = $tipo->tipo_nombre;
            

        }
            
        }

          
        $this->descrip = $descrip;
        $this->codigo = $codigo;
        $this->codigoOriginal = $codigo;
        $this->descripOriginal = $descrip;

    }
    
    
    public function checkSameProduct($descrip, $codigo){

        $value = false;

        $prefabricados = Prefabricado::all();

        foreach ($prefabricados as $prefabricado) {

            if ($prefabricado->pre_descripcion == $descrip || $prefabricado->pre_codigo == $codigo) {
                
                $value = true;

            }
        }


        return $value;

    }

    public function updatedCodigo(){

        $this->checkSetParameters(false);

    }

    public function updatedDescrip(){

        $this->checkSetParameters(false);

    }

    public function render()
    {

        $this->checkSetParameters(false);

        return view('livewire.prefabricado.add-pre',[

            'tipos' => Tipo::all()->where('tipo_pro_id','2'),
            'colores' => Color::all(),
            'espesores' => Espesor::all(),
            'resistencias' => Resistencia::all(),
            'dimensiones' => Dimension::all(),
            'capas' => Capa::all(),
            'unidades' => Unidad::all()->where('tipo_pro_id','2')

        ]);
    }
}

