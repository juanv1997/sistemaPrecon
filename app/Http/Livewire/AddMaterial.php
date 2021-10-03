<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Tipo;
use App\Models\Unidad;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddMaterial extends Component
{

    use WithFileUploads;

    public $openModal = false;
    public Material $material;
    public $image;
    public $listeners = ['featureAdded'=>'render'];
    
    public function mount(Material $material){

        $this->material = $material;
        

    }

    protected $rules = [
   
      'material.tipo_id'=>'required',
      'material.unidad_id'=>'required',
      'material.material_precio'=>'required',
      'material.material_descrip'=>'required',
      'material.material_observacion'=>'required',
      'material.material_cod'=>'required',
      'material.material_stock'=>'required',
      'image'=>'required'

    ];

    protected $messages = [
       
        'material.material_precio.required' => 'Dede ingresar un valor en el precio',
        'material.material_descrip.required' => 'Dede ingresar una descripción',
        'material.unidad_id.required' => 'Debe seleccionar una unidad para el material',
        'material.tipo_id.required' => 'Debe seleccionar un tipo de material ',
        'image.required'=>'Debe insertar una imagen para el material',
        'material.material_observacion.required' => 'Dede ingresar una descripción',
        'material.material_cod.required' => 'Dede ingresar un código para el material',
        'material.material_stock.required' => 'Dede ingresar un stock',
    ];

    public function addMaterial(){
    
        $this->validate();
        date_default_timezone_set("America/Lima");
        $this->material->material_importe = $this->material->material_stock*$this->material->material_precio;
        $imageName = $this->material->material_descrip."_".date('d-m-Y').".png";
        $imagePath = $this->image->storeAs('img/materiales',$imageName);
        $this->material->material_image_path = $imagePath;

        $this->material->save();

        $material = new Material();
        $this->material = $material;
        $this->emit('materialAdded');
        $this->emit('itemAdded');

    }

    public function render()
    {

        return view('livewire.material.add-material',[

            'tipos'=>Tipo::all()->where('tipo_pro_id','3'),
            'unidades' => Unidad::all()->where('tipo_pro_id','3')

        ]);
    }
}

