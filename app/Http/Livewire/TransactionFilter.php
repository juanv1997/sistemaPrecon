<?php

namespace App\Http\Livewire;

//use App\Exports\FilterReportExport;
//use App\Models\Entrada;
use App\Models\Material;
use App\Models\Prefabricado;
//use App\Models\Salida;
use App\Models\TipoProducto;
use Livewire\Component;
//use Maatwebsite\Excel\Facades\Excel;

class TransactionFilter extends Component
{       
    protected $listeners = ['productChanged'=>'removeDefaultItem','reset'=>'resetProduct','activateButton','resetDate'];
    public $defaultPre = true;
    public $defaultMaterial = true;
    //public $test = "es un test";
    public $search;
    public $tipoProducto="Prefabricado";
    public $tipoTransaccion = "Entradas";
    public $producto = "default";
    public $dateBegin;
    public $dateEnd;
    public $dateIntervalToggle=0;
    public $productoToggle=0;
    public $listItems ;
    public $listProductos;
    public $dateDefault = '2017-06-01';
    public $buttonActivated = false;
    public $stringResult ;
    
    protected $messages = [
        'dateBegin.required'=>'La fecha de inicio es requerida',
        'dateEnd.required'=>'La fecha de fin es requerida'
    ];
    
    public function mount(){

        $this->filter();
        
    }
    
    protected function rules(){

        if ( ($this->productoToggle==1 && $this->dateIntervalToggle==1) || $this->dateIntervalToggle==1 ) {

            return[

                'dateBegin'=>'required',
                'dateEnd'=>'required',
            ];
        
        }
    }


    public function filter(){

        if ( $this->dateIntervalToggle==1 || 
        ($this->productoToggle==1 && $this->dateIntervalToggle==1) ) 
        {
            $this->validate();
        }
        
        $parameters = ["tipo"=>$this->tipoProducto,"transaccion"=>$this->tipoTransaccion,
                       "producto"=>$this->producto,"dateBegin"=>$this->dateBegin,
                       "dateEnd"=>$this->dateEnd,"dateToggle"=>$this->dateIntervalToggle,
                        "productoToggle"=>$this->productoToggle];
         $this->emit('filter',$parameters);
    }

    public function resetProduct(){
        
        $this->reset('producto');
       
    }
    
    public function render()
    {   
        
        return view('livewire.transaction-filter',[

            'tipo_productos'=>TipoProducto::all(),
            'prefabricados'=>Prefabricado::all(),
            'materiales'=>Material::all()

        ]);
    }
}
