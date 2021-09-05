<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Prefabricado;
use Livewire\Component;

class ListProducts extends Component
{

    public function render()
    {

        return view('livewire.list-products',[

            'prefabricados'=>Prefabricado::all()

        ]);
    }
}
