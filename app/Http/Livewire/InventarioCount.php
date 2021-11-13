<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use Livewire\Component;

class InventarioCount extends Component
{   

    protected $listeners = ["getStockPro","getStockCod","stockChecked",'resetCount'];

    public $stockProducto = 0;

    public $stockCod = 0;

    // public $stockCheck = true;

     

    public function getStockPro($descripPro,$tipoPro){

         $item = null;

         if ($tipoPro=="Prefabricado") {
            
             $item = Prefabricado::where('pre_descripcion',$descripPro)->first(); 
            $this->stockProducto = $item->pre_stock;
            
         } 
         else {
            
             $item = Material::where('material_descrip',$descripPro)->first();
             $this->stockProducto = $item->material_stock;
         }
        
    }

    public function getStockCod($codPro){

        $item = null;
        $cod = trim($codPro);

        $item = Prefabricado::where('pre_codigo',$cod)->first(); 
        
        if ($item!=null) {

            $this->stockProducto = $item->pre_stock;

        }
        if ($item == null) {
                
            $item = Material::where('material_cod',$cod)->first();
            $this->stockProducto = $item->material_stock;
            
        }
           
        // $this->emit('stockChecked');
        
    }

    public function resetCount(){

        $this->stockProducto = 0;

    }

    // public function stockChecked(){

    //     $this->stockCheck = true;

    // }

    public function render()
    {
        return view('livewire.inventario-count');
    }
}
