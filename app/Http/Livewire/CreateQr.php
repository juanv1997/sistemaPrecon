<?php

namespace App\Http\Livewire;


use Livewire\Component;

class CreateQr extends Component
{
    
    public $queryType;
    public $documentType = "excel";   
    
    public function render()
    {
        return view('livewire.create-qr');
    }
}

