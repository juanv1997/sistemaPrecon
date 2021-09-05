<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Tipo;
use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowMaterial extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $openModal = false;
    protected $listeners = ['materialAdded'=>'render','findMaterial'];
    public $val=5;
    public Material $material,$materialEdit;
    public $image;

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
    $materialToDestroy->delete();
    $material = new Material();
    $this->material = $material;
    $this->emit('materialDestroyed');
    $this->emit('itemDestroyed');
}

    public function render()
    {
        return view('livewire.material.show-material',[

            'materiales'=>Material::join('tbl_unidad','tbl_material.unidad_id','=','tbl_unidad.unidad_id')
                        ->join('tbl_tipo','tbl_material.tipo_id','=','tbl_tipo.tipo_id')
                        ->paginate(7),
            'tipos'=>Tipo::all()->where('tipo_pro_id','3'),
            'unidades' => Unidad::all()->where('tipo_pro_id','3')            


        ]);
    }
}

