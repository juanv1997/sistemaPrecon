<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use Livewire\Component;

class ProductOptions extends Component
{   

    public $tipoProducto = "Prefabricado";
    
    protected $listeners = ['tipoPro' => 'getTipoPro']; 


    public function getTipoPro($tipoPro){

        $this->tipoProducto = $tipoPro;

    }

    public function render()
    {
        return view('livewire.product-options',[

            'prefabricados' => Prefabricado::all(),
            'materiales' => Material::all()

        ]);
    }
}
