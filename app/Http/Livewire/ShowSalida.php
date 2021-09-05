<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use App\Models\Salida;
use Livewire\Component;

class ShowSalida extends Component
{
    protected $listeners = ['add','itemDestroyed'=>'destroyItem','itemFinded','addSalida'];
    public $productos = array();
    public $delete = 0;
    public $itemDescrip = "";
    public $itemId = 0;

    public function add($pro){

        array_push($this->productos,$pro);

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

    public function destroyItem($id){

        unset($this->productos[$id]);

    }

    public function destroyListItems(){

        unset($this->productos);

    }

    public function addSalida(){

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

                Salida::create(
                                [
                                    'pre_id'=>$pro->pre_id,
                                    'material_id'=>null,
                                    'salida_cantidad'=>$producto['cantidad'],
                                    'salida_fecha'=>date("Y-m-d"),
                                    'salida_total'=>$producto['total'],
                                    'salida_hora_creacion'=>$time
                                ]

                                );
                                $proToUpdate = Prefabricado::find($pro->pre_id);
                                $proToUpdate->pre_stock = $proToUpdate->pre_stock - $producto['cantidad'];
                                $proToUpdate->pre_importe = $proToUpdate->pre_importe - $producto['total'];
                                $proToUpdate->save();
            }else{

                $pro = Material::where('material_cod',$cod)->first();

                Salida::create(
                    [
                        'pre_id'=>null,
                        'material_id'=>$pro->material_id,
                        'salida_cantidad'=>$producto['cantidad'],
                        'salida_fecha'=>date("Y-m-d"),
                        'salida_total'=>$producto['total'],
                        'salida_hora_creacion'=>$time
                    ]

                    );

                    $proToUpdate = Material::find($pro->material_id);
                    $proToUpdate->material_stock = $proToUpdate->material_stock - $producto['cantidad'];
                    $proToUpdate->material_importe = $proToUpdate->material_importe - $producto['total'];
                    $proToUpdate->save();

            }

        }

        unset($this->productos);
        $this->productos = array();
        $this->emit('alert');

    }

    public function render()
    {

        return view('livewire.salida.show-salida');
    }
}

