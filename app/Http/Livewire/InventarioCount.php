<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use Livewire\Component;

class InventarioCount extends Component
{   

    protected $listeners = ["itemChanged"];

    public $stockProducto = 0;


    public function itemChanged($descripPro,$tipoPro){

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

    public function render()
    {
        return view('livewire.inventario-count');
    }
}
