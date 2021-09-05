<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use Livewire\Component;

class Home extends Component
{   

    public $materiales;
    public $prefabricados;

    public function render()
    {   
        $materiales = Material::all();
        $prefabricados = Prefabricado::all();
        return view('livewire.home');
    }
}
