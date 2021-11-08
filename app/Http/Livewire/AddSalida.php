<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use Livewire\Component;
use Livewire\Livewire;

class AddSalida extends Component
{
    public $tipoProducto = "Prefabricado";
    public $producto ;
    public $cantidadPro;
    public $codigo;
    public $cantidadCod;
    public $addMethod = "addItemByPro";
    public $byProduct = true;
    public $byCode = false;
    public $stockProducto = 0;
    public $buttonActivated = true;
    public $showDefaultOption = true;
    protected $listeners  = ['defaultItemRemoved','reset' => 'resetSelect','activateButton','resetProductOption'];
    public $test = "hola";
    
    protected $messages = [

        "cantidadCod.required"=>"Debe ingresar una cantidad de items",
        "cantidadPro.required"=>"Debe ingresar una cantidad de items",
        "codigo.required"=>"Debe ingresar un codigo de producto",
        "producto.required"=>"Debe escoger un producto de la lista"

    ];
    
    protected function rules(){

        if ($this->byProduct) {
            
            return[

                'producto'=>'required',
                'cantidadPro'=>'required'
                
            ];

        } else {
            return[

                'codigo'=>'required',
                'cantidadCod'=>'required'

            ];
        }
                

    }

    public function resetSelect(){
        
         $this->reset('producto');
         $this->buttonActivated = true;
    }
    

    public function activateButton(){

        $this->buttonActivated = false;

    }
    
    public function addItemByCode(){

            $this->validate();
            
            $this->getStock();

            if ($this->cantidadCod <= $this->stockProducto) {

                $pro = array();
                $item = null;
                $cod = trim($this->codigo);
                $item = Prefabricado::where( 'pre_codigo', $cod )->first();
    
                if($item != null){
    
                    $pro = array(   
                                    'tipo'=>'pre',
                                    'codigo'=>$item->pre_codigo,
                                    'descrip'=>$item->pre_descripcion,
                                    'precio'=>$item->pre_precio,
                                    'cantidad'=>$this->cantidadCod,
                                    'total'=>$item->pre_precio*$this->cantidadCod
                                );
    
                     $this->emit('add',$pro);
                }
                else{
    
                    $item = Material::where('material_cod', $cod )->first();
    
                    if($item != null){
    
                        $pro = array(   
                                        'tipo'=>'material',
                                        'codigo'=>$item->material_cod,
                                        'descrip'=>$item->material_descrip,
                                        'precio'=>$item->material_precio,
                                        'cantidad'=>$this->cantidadCod,
                                        'total'=>$item->material_precio*$this->cantidadCod
                        );
                        $this->emit('add',$pro);
    
                    }else{
    
    
    
    
                    }
    
                }
            }else {


                
            }
            
            

    }

    public function addItemByPro(){

        $pro = array();

        $this->validate();

        $this->getStock();

        if ($this->cantidadPro <= $this->stockProducto  ) {
            
            
            $item = null;
            $item = Prefabricado::where('pre_descripcion',$this->producto)->first();
    
            if($item != null){
    
                $pro = array(  
                                'tipo'=>'pre',
                                'codigo'=>$item->pre_codigo,
                                'descrip'=>$item->pre_descripcion,
                                'precio'=>$item->pre_precio,
                                'cantidad'=>$this->cantidadPro,
                                'total'=>$item->pre_precio*$this->cantidadPro
                            );
    
                $this->emit('add',$pro);
            }
            else{
    
                $item = Material::where('material_descrip',$this->producto)->first();
    
                if($item != null){
    
                    $pro = array(   
                                    'tipo'=>'material',
                                    'codigo'=>$item->material_cod,
                                    'descrip'=>$item->material_descrip,
                                    'precio'=>$item->material_precio,
                                    'cantidad'=>$this->cantidadPro,
                                    'total'=>$item->material_precio*$this->cantidadPro
                    );
                    $this->emit('add',$pro);
    
                }
    
            }

            //$this->emit('');

        } else {
            
            $item = null;
            $item = Prefabricado::where('pre_descripcion',$this->producto)->first();
    
            if($item != null){
    
                $pro = array(  
                                'tipo'=>'pre',
                                'codigo'=>$item->pre_codigo,
                                'descrip'=>$item->pre_descripcion,
                                'precio'=>$item->pre_precio,
                                'cantidad'=>$this->cantidadPro,
                                'total'=>$item->pre_precio*$this->cantidadPro
                            );
    
                
            }
            else{
    
                $item = Material::where('material_descrip',$this->producto)->first();
    
                if($item != null){
    
                    $pro = array(   
                                    'tipo'=>'material',
                                    'codigo'=>$item->material_cod,
                                    'descrip'=>$item->material_descrip,
                                    'precio'=>$item->material_precio,
                                    'cantidad'=>$this->cantidadPro,
                                    'total'=>$item->material_precio*$this->cantidadPro
                    );
                    
    
                }
    
            }
            
            $this->emit('stockFail',$pro);

        }
        
    }

    public function getStock(){

        $item = null;

        if ($this->byProduct) {
            
            if ($this->tipoProducto=="Prefabricado") {
           
                $item = Prefabricado::where('pre_descripcion',$this->producto)->first(); 
               $this->stockProducto = $item->pre_stock;
               
            } 
            else {
               
                $item = Material::where('material_descrip',$this->producto)->first();
                $this->stockProducto = $item->material_stock;
            }

        } elseif($this->byCode) {
            
              $cod = trim($this->codigo);
               
              $item = Prefabricado::where('pre_codigo', $cod )->first(); 
        
               if ($item) {
                    
                    $this->stockProducto = $item->pre_stock;

               }else {

                    $item = Material::where('material_cod', $cod )->first();
                    $this->stockProducto = $item->material_stock;
               }
        }

   }

    public function changeSelect($inputType){

        if($inputType=='byProduct'){

            $this->byProduct = true;
            $this->byCode = false;
            $this->addMethod = "addItemByPro";

        }
        else{

            $this->byProduct = false;
            $this->byCode = true;
            $this->addMethod = "addItemByCode";
        }


    }

    public function render()
    {   
        $prefabricados = Prefabricado::all();
        $materiales = Material::all();
        return view('livewire.salida.add-salida',compact('prefabricados','materiales'));
    }
}

