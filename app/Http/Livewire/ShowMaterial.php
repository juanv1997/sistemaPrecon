<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Tipo;
use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShowMaterial extends Component
{
    use WithPagination;
    use WithFileUploads;

    //public $test="perro";
    public $openModal = false;
    protected $listeners = ['materialAdded'=>'render','findMaterial','updateStatus'];
    public $val=5;
    public Material $material , $materialEdit, $infoMaterialToShow; 
    public $image;
    public $materialCount = 0;

    // public function test(){

    //     $this->reset('test');
    // }
    
    protected $rules = [

        'material.material_precio'=>'required',
        'material.material_observacion'=>'required', 

    ];

    public function findMaterial($idMaterial,$eventName){

        $this->material = Material::where('material_id',$idMaterial)
                        ->join('tbl_unidad','tbl_material.unidad_id','=','tbl_unidad.unidad_id')
                        ->join('tbl_tipo','tbl_material.tipo_id','=','tbl_tipo.tipo_id')
                        ->first();
        
                        
        switch ($eventName) {
            case 'edit':
                $this->emit('materialFindedToEdit');
                break;
            
            case 'view':
                $this->emit('materialFindedToView');
                break;

            case 'destroy':
                $this->emit('materialFindedToDestroy');
                break;

        }
   }

   public function destroyMaterial(){

        $materialToDestroy = Material::find($this->material->material_id);
        Storage::delete($materialToDestroy->material_image_path);
        $materialToDestroy->delete();
        $material = new Material();
        $this->material = $material;
        $this->emit('materialDestroyed');
        $this->emit('itemDestroyed');

}

    public function editMaterial(){

        $this->validate();

        $imageName =  $this->material->material_descrip."_".substr($this->material->material_image_path,-14);

        if($this->image){

            $this->material->material_image_path = $this->image->storeAs('img/materiales',$imageName); 
        }
        
        $this->material->save();
        $this->reset('image');
        $this->emit('materialEdited');
        $this->emit('itemEdited');
            
    }

    public function updateStatus($materialId){

        $materialToUpdate = Material::find($materialId);
        
        if ($materialToUpdate->material_status == "A") 
        {
            $materialToUpdate->material_status = "I";

        }else{

            $materialToUpdate->material_status = "A";
        }

        $materialToUpdate->save();
    }

    public function render()
    {
        return view('livewire.material.show-material',[

            'materiales'=>Material::join('tbl_unidad','tbl_material.unidad_id','=','tbl_unidad.unidad_id')
                        ->join('tbl_tipo','tbl_material.tipo_id','=','tbl_tipo.tipo_id')
                        ->orderBy('material_id','desc')
                        ->paginate(7),
            'tipos'=>Tipo::all()->where('tipo_pro_id','3'),
            'unidades' => Unidad::all()->where('tipo_pro_id','3'),
            'materialCount' => $this->materialCount = DB::table('tbl_material')->count()          


        ]);
    }
}

