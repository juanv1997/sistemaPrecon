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

        $sameFeature = $this->checkSameFeature();

        if ($sameFeature){
            
            $this->emit('sameFeature');
            
        }else{

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

        
    }

    public function checkSameFeature(){

        $isTheSame = false;

        switch($this->feature){

            case "Tipo":

                $tipos = Tipo::all();

                foreach($tipos as $tipo){

                    if($tipo->tipo_nombre==$this->featureValue){

                        $isTheSame = true;

                        return $isTheSame;

                    }

                }

                break;

            case "Espesor":

                $espesores = Espesor::all();

                foreach($espesores as $espesor){

                    if($espesor->espesor_cantidad==$this->featureValue){

                        $isTheSame = true;

                        return $isTheSame;

                    }

                }

                break;
            
            case "Resistencia":

                $resistencias = Resistencia::all();

                foreach($resistencias as $resistencia){

                    if($resistencia->resistencia_cantidad==$this->featureValue){

                        $isTheSame = true;

                        return $isTheSame;

                    }

                }

                break;

            case "Color":

                $colores = Color::all();

                foreach($colores as $color){

                    if($color->color_nombre==$this->featureValue){

                        $isTheSame = true;

                        return $isTheSame;

                    }

                }

                break;
            
            case "Dimensión":   

                $dimensiones = Dimension::all();

                foreach($dimensiones as $dimension){

                    if($dimension->dimension_medida==$this->featureValue){

                        $isTheSame = true;

                        return $isTheSame;

                    }

                }

                break;

            case "Unidad":

                $unidades = Unidad::all();

                foreach($unidades as $unidad){

                    if($unidad->unidad_nombre==$this->featureValue){

                        $isTheSame = true;

                        return $isTheSame;

                    }

                }

                break;

        }
        
    }

    public function render()
    {
        return view('livewire.add-feature');
    }
}
