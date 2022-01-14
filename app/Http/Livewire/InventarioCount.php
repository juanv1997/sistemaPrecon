<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use App\Models\Unidad;
use Livewire\Component;

class InventarioCount extends Component
{   

    protected $listeners = ["getStockPro","stockChecked",'resetCount'];

    public $stockProducto = 0;

    public $stockCod = 0;

    public $itemUnidad;

    public $stringResult= "";
   

    public function getStockPro($descripPro,$tipoPro){

         $item = null;

         $vocales = array("a","e","i","o","u");

         $isVocal = false;

         if ($tipoPro=="Prefabricado") {
            
             $item = Prefabricado::where('pre_descripcion',$descripPro)->first(); 

             $this->stockProducto = $item->pre_stock;

             $unidad = Unidad::find($item->unidad_id);

             $this->itemUnidad = $unidad->unidad_nombre;


             if ($this->itemUnidad == "metro cuadrado") { 
                    
                $this->stringResult = $this->stockProducto." "."m2";

             }elseif($this->itemUnidad == "unidad"){

                $this->stringResult = $this->stockProducto." ".$this->itemUnidad."es";
                 
             }else{

                $lastLetter = substr($this->itemUnidad, -1);

                foreach ($vocales as $data => $vocal ) {
                    
                    if ($vocal == $lastLetter) {
                        
                        $isVocal = true;
                        break;
                    }

                }

                 if ($isVocal) {
                   
                    $this->stringResult = $this->stockProducto." ".$this->itemUnidad."s";

                 }else {
                    
                    $this->stringResult = $this->stockProducto." ".$this->itemUnidad."es";

                 }

                

             }
            
             
            
            
         } 
         else {
            
             $item = Material::where('material_descrip',$descripPro)->first();

             $this->stockProducto = $item->material_stock;

             $unidad = Unidad::find($item->unidad_id);

             $this->itemUnidad = $unidad->unidad_nombre;

             if ($this->itemUnidad == "metro cuadrado") { 
                    
                $this->stringResult = $this->stockProducto." "."m2";

             }elseif($this->itemUnidad == "unidad"){

                $this->stringResult = $this->stockProducto." ".$this->itemUnidad."es";
                 
             }else{

                $lastLetter = substr($this->itemUnidad, -1);

                foreach ($vocales as $data => $vocal ) {
                    
                    if ($vocal == $lastLetter) {
                        
                        $isVocal = true;
                        break;
                    }

                }

                 if ($isVocal) {
                   
                    $this->stringResult = $this->stockProducto." ".$this->itemUnidad."s";

                 }else {
                    
                    $this->stringResult = $this->stockProducto." ".$this->itemUnidad."es";

                 }

             }
             
             
         }
        
    }

    public function resetCount(){

        $this->stockProducto = 0;

    }

    public function render()
    {
        return view('livewire.inventario-count');
    }
}
