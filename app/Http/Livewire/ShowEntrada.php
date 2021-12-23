<?php

namespace App\Http\Livewire;

use App\Models\Entrada;
use App\Models\Material;
use App\Models\Prefabricado;
use Livewire\Component;

class ShowEntrada extends Component
{
    protected $listeners = ['add','itemFinded','addEntrada'];
    public $productos = array();
    public $delete = 0;
    public $itemDescrip = "";
    public $itemId = 0;
    

    public function add($pro){
        
        //Codigo anterior

        //array_push($this->productos,$pro);

        //Nuevo codigo

        $productExists = false;

        foreach ($this->productos as $item){

            if($item['codigo'] == $pro['codigo']){

                $productExists = true;
                $this->emit('itemExists');
                break;
            }
        }
    
        if (!$productExists) {
            array_push($this->productos,$pro);
        }
        

    }

    public function itemFinded($itemId){

        
        $this->itemId = $itemId;
        $item = $this->productos[$itemId];
        $this->itemDescrip = $item['descrip'];
        $this->emit('itemToRemove');
    }

    public function removeItem(){

        unset($this->productos[$this->itemId]);
        $this->emit('itemRemoved');
    }

   
    public function addEntrada(){
        
        date_default_timezone_set("America/Lima");
        $pro = null;
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

         $time = $hours." : ".$minutes." : ".$seconds;

        foreach($this->productos as $producto){

            $cod = $producto['codigo'];

            $pro = Prefabricado::where('pre_codigo',$cod)->first();

            if($pro!=null){

                Entrada::create(
                                [
                                    'pre_id'=>$pro->pre_id,
                                    'material_id'=>null,
                                    'entrada_cantidad'=>$producto['cantidad'],
                                    'entrada_fecha'=>date("Y-m-d"),
                                    'entrada_total'=>$producto['total'],
                                    'entrada_hora_creacion'=>$time
                                ]

                                );
                
                $proToUpdate = Prefabricado::find($pro->pre_id);
                $proToUpdate->pre_stock = $proToUpdate->pre_stock + $producto['cantidad'];
                $proToUpdate->pre_importe = $proToUpdate->pre_importe + $producto['total'];
                $proToUpdate->save();
            
            }else{

                $pro = Material::where('material_cod',$cod)->first();

                Entrada::create(
                    [
                        'pre_id'=>null,
                        'material_id'=>$pro->material_id,
                        'entrada_cantidad'=>$producto['cantidad'],
                        'entrada_fecha'=>date("Y-m-d"),
                        'entrada_total'=>$producto['total'],
                        'entrada_hora_creacion'=> $time
                    ]

                    );

                    $proToUpdate = Material::find($pro->material_id);
                    $proToUpdate->material_stock = $proToUpdate->material_stock + $producto['cantidad'];
                    $proToUpdate->material_importe = $proToUpdate->material_importe + $producto['total'];
                    $proToUpdate->save();

            }

        }

       unset($this->productos);
       $this->productos = array();
       $this->emit('alert');

    }

    public function render()
    {
        return view('livewire.entrada.show-entrada');
    }
}
