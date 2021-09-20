<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use App\Models\TipoProducto;
use Livewire\Component;

class TransactionFilter extends Component
{       
    protected $listeners = ['productChanged'=>'removeDefaultItem'];
    public $defaultPre = true;
    public $defaultMaterial = true;
    //public $test = "es un test";
    public $search;
    public $tipoProducto="Prefabricado";
    public $tipoTransaccion = "Entradas";
    public $producto;
    public $dateBegin;
    public $dateEnd;
    public $dateIntervalToggle=0;
    public $productoToggle=0;
    public $listItems;
    public $listProductos;
    public $dateDefault = '2017-06-01';

    public function filter(){

        $parameters = ["tipo"=>$this->tipoProducto,"transaccion"=>$this->tipoTransaccion,
                      "producto"=>$this->producto,"dateBegin"=>$this->dateBegin,
                      "dateEnd"=>$this->dateEnd,"dateToggle"=>$this->dateIntervalToggle,
                       "productoToggle"=>$this->productoToggle];
        $this->emit('filter',$parameters);
    }

    public function fillProductSelect(){

        $productItems = null;

        switch ($this->tipoProducto) {
            case "Prefabricado":

             $productItems = Prefabricado::all();

            break;
                    
            case "Material":
                        
            $productItems = Material::all();

            break;
        }

        return $productItems;
    }

    public function removeDefaultItem($product){


        $this->test = $product;

        switch ($product) {
            case 'Prefabricado':
                $this->defaultPre = false;
                break;
            
            case 'Material':
                $this->defaultMaterial = false; 
                break;
        }

    }

    public function render()
    {   
        $tipo_productos = TipoProducto::all();
        $listProducts = $this->fillProductSelect();
        return view('livewire.transaction-filter',[

            'tipo_productos'=>$tipo_productos,
            'productos'=>$listProducts

        ]);
    }
}
