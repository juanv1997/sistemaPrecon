<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Livewire;

class AddEntrada extends Component
{
    public $tipoProducto = "Prefabricado";
    public $producto;
    public $cantidadPro;
    public $codigo;
    public $cantidadCod;
    //public $addMethod = "addItemByPro";
    //public $byProduct = true;
    //public $byCode = false;
    public $stockProducto = 0;

    protected $listeners  = ['defaultItemRemoved','reset' => 'resetSelect','activateButton','resetProductOption','changeToCode'=>'selectTypeProductInput','changeToProduct'=>'selectTypeProductInput','desactivateButton','getProducts','setCode','setResultList'];
    
    public $inputType = "product";

    protected $messages = [

        "cantidadCod.required"=>"Debe ingresar una cantidad ",
        "cantidadCod.min"=>"Debe ingresar una cantidad  mayor a 0",
        "cantidadCod.max"=>"Debe ingresar una cantidad menor a 10000",
        "cantidadPro.required"=>"Debe ingresar una cantidad de items",
        "cantidadPro.min"=>"Debe ingresar una cantidad mayor a 0",
        "cantidadPro.max"=>"Debe ingresar una cantidad menor a 10000",
        "codigo.required"=>"Debe ingresar un codigo de producto",
        "producto.required"=>"Debe escoger un producto de la lista"

    ];
    
    protected function rules(){

        
        
        if ($this->inputType == "product") {
            
            return[

                'producto'=>'required',
                'cantidadPro'=>'required|numeric|min:1|max:10000',
                
            ];

        } else {
            return[

                'codigo'=>'required',
                'cantidadCod'=>'required|numeric|min:1|max:10000'

            ];
        }
                

    }

    public function addItemByCode(){
        
        $this->validate();

        $productExits = $this->checkProduct($this->codigo);

        if ($productExits) {
           
            $pro = array();
            $item = null;
            $item = Prefabricado::where('pre_codigo',$this->codigo)->first();

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

                $item = Material::where('material_cod',$this->codigo)->first();

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

            $this->emit('productNotExist');

        }


    }

    public function addItemByPro(){

        $this->validate();

        $this->getStock();

        $pro = array();
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

            }else{

                

            }

        }


    }

    public function getStock(){

        $item = null;

        if ($this->inputType == "product") {
            
            if ($this->tipoProducto=="Prefabricado") {
           
                $item = Prefabricado::where('pre_descripcion',$this->producto)->first(); 
               $this->stockProducto = $item->pre_stock;
               
            } 
            else {
               
                $item = Material::where('material_descrip',$this->producto)->first();
                $this->stockProducto = $item->material_stock;
            }

        } elseif($this->inputType == "code") {
            
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

    public function checkProduct(){

        $exits = false;
        $item = null;
        $cod = trim($this->codigo);

        $item = Prefabricado::where( 'pre_codigo', $cod )->first();
    
        if ($item) {
            
            $exits = true;
        }
        else {
            
            $item = Material::where( 'material_cod', $cod )->first();
            if ($item) {
                
                $exits = true;
            }

        }

        return $exits;

    }

    public function getProducts(){

        $prefabricados = DB::table('tbl_prefabricado')
                        ->where('tbl_prefabricado.pre_status','=','A')
                        ->select('tbl_prefabricado.pre_codigo','tbl_prefabricado.pre_descripcion',
                                'tbl_prefabricado.pre_id')
                        ->get();
        $materiales = DB::table('tbl_material')
                        ->where('tbl_material.material_status','=','A')
                        ->select('tbl_material.material_cod','tbl_material.material_descrip',
                                'tbl_material.material_id')
                        ->get();

         $this->emit('loadProducts',$prefabricados,$materiales);

    }

    public function setCode($code){

        $this->codigo = $code;

    }


    public function render()
    {
        $prefabricados = DB::table('tbl_prefabricado')
                            ->join('tbl_unidad','tbl_prefabricado.unidad_id','=','tbl_unidad.unidad_id')
                            ->where('tbl_prefabricado.pre_status','=','A')
                            ->get();
        $materiales = DB::table('tbl_material')
                            ->join('tbl_unidad','tbl_material.unidad_id','=','tbl_unidad.unidad_id')
                            ->where('tbl_material.material_status','=','A')
                            ->get();
                            
        $this->emit('render');
        return view('livewire.entrada.add-entrada',compact('prefabricados','materiales'));
    }
}

