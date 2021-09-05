<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use Livewire\Component;
use Livewire\Livewire;

class AddEntrada extends Component
{
    public $tipoProducto = "Prefabricado";
    public $producto;
    public $cantidadPro;
    public $codigo;
    public $cantidadCod;
    public $addMethod = "addItemByPro";
    public $byProduct = true;
    public $byCode = false;


    public function addItemByCode(){
        
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



    }

    public function addItemByPro(){


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
        return view('livewire.entrada.add-entrada',compact('prefabricados','materiales'));
    }
}

