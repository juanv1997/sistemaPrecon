<?php

namespace App\Http\Livewire;


use Livewire\Component;

class CreateQr extends Component
{
    
    public $queryType;   
    public $tipo;
    public $transaccion;
    public $producto;
    public $dateBegin;
    public $dateEnd;
    public $dateToggle;
    public $productoToggle;
    public $stringResult;
    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.create-qr');
    }
}

