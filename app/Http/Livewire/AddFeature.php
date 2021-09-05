<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Dimension;
use App\Models\Espesor;
use App\Models\Resistencia;
use App\Models\Tipo;
use App\Models\Unidad;
use Livewire\Component;

class AddFeature extends Component
{
    public $feature;
    public $featureValue;
    public $tipoProducto;

    protected $rules = [

        'feature'=>'required',
        'featureValue'=>'required'
    ];

    public function addFeature(){

        $this->validate();
        $tipoProducto = 0;
        if($this->tipoProducto=="pre"){

            $tipoProducto = 2;

        }else{
            $tipoProducto = 3;
        }

        switch ($this->feature) {
            case 'Tipo':
               Tipo::create([

                'tipo_nombre'=>$this->featureValue,
                'tipo_descripcion'=>$this->featureValue,
                'tipo_pro_id'=>$tipoProducto

               ]);
                break;
            
            case 'Resistencia':
                Resistencia::create([
                 'resistencia_cantidad'=>$this->featureValue
                ]);
                break;
            case 'Espesor':
                Espesor::create([
                    'espesor_cantidad'=>$this->featureValue
                    ]);
                break;

            case 'Color':
                Color::create([

                    'color_nombre'=>$this->featureValue,
                    'color_inicial'=>$this->featureValue[0]

                ]);
                break;

            case 'Dimensión':

                Dimension::create([

                    'dimension_medida'=>$this->featureValue

                ]);

                break;
          
            case 'Unidad':
                
                Unidad::create([

                    'unidad_nombre'=>$this->featureValue,
                    'unidad_termino'=>$this->featureValue[0],
                    'tipo_pro_id'=>$tipoProducto

                ]);

                break;     
                    
        }

        $this->emit('featureAdded');
    }

    public function render()
    {
        return view('livewire.add-feature');
    }
}
