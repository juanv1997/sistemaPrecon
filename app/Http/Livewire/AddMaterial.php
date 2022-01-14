<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Tipo;
use App\Models\Unidad;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AddMaterial extends Component
{

    use WithFileUploads;

    public $openModal = false;
    public Material $material;
    public $image;
    public $listeners = ['featureAdded'=>'render','reset'=>'resetSelect'];
    
    public function mount(Material $material){

        $this->material = $material;
        

    }

    protected $rules = [
   
      'material.tipo_id'=>'required',
      'material.unidad_id'=>'required',
      'material.material_precio'=>'required|numeric|min:1|max:10000',
      'material.material_descrip'=>'required|max:50',
      'material.material_observacion'=>'required|max:120',
      'material.material_cod'=>'required|max:50',
      'material.material_stock'=>'required|numeric|min:1|max:10000',
      'image'=>'required'

    ];

    protected $messages = [
       
        'material.material_descrip.required' => 'Dede ingresar una descripción',
        'material.material_descrip.max' => 'La descripción debe tener máximo 50 caracteres',
        'material.unidad_id.required' => 'Debe seleccionar una unidad para el material',
        'material.tipo_id.required' => 'Debe seleccionar un tipo de material ',
        'image.required'=>'Debe insertar una imagen para el material',
        'material.material_observacion.required' => 'Dede ingresar una descripción',
        'material.material_observacion.max' => 'La descripción debe tener máximo 120 caracteres', 
        'material.material_cod.required' => 'Dede ingresar un código para el material',
        'material.material_cod.max' => 'El código debe tener máximo 50 caracteres',
        'material.material_stock.required' => 'Dede ingresar un stock',
        'material.material_stock.min' => 'El stock debe ser mayor a 0',
        'material.material_stock.max' => 'El stock debe ser menor a 10000',
        'material.material_precio.required' => 'Dede ingresar un valor en el precio',
        'material.material_precio.min' => 'El precio debe ser mayor a 0',
        'material.material_precio.max' => 'El precio debe ser menor a 10000',
        
       
        
        
    ];

    public function addMaterial(){
    
        $this->validate();
        date_default_timezone_set("America/Lima");
        $this->material->material_importe = $this->material->material_stock*$this->material->material_precio;
        $this->material->material_status = "A";  
        $imageName = $this->material->material_descrip."_".date('d-m-Y').".png";
        $imagePath = $this->image->storeAs('img/materiales',$imageName);
        $this->material->material_image_path = $imagePath;

        $this->material->save();

        $material = new Material();
        $this->material = $material;
        $this->emit('materialAdded');
        $this->emit('itemAdded');

    }

    public function resetSelect($selectId){

        switch ($selectId) {

            case 'cbTipo':

                $this->material->tipo_id = null;

                break;

            case 'cbUnidad':

                $this->material->unidad_id = null;
            
                break;
        }

    }


    public function render()
    
    {
        return view('livewire.material.add-material',[

            'tipos'=>Tipo::all()->where('tipo_pro_id','3'),
            'unidades' => Unidad::all()->where('tipo_pro_id','3'),
             
        ]);
    }
}

