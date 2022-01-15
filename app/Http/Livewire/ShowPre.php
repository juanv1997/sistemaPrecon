<?php

namespace App\Http\Livewire;

use App\Models\Capa;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Espesor;
use App\Models\Prefabricado;
use App\Models\Resistencia;
use App\Models\Tipo;
use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShowPre extends Component
{
    use WithPagination;
    use WithFileUploads;

    //public $openModal = false;
    protected $listeners = ['preAdded'=>'render','findPrefabricado','updateStatus'];
    public $val=5;
    public Prefabricado $prefa ,$pre;
    public $image;
    public $destroyBanner = false;
    public $editBanner = false;
    public $preCount = 0;
    public $test = 0;
   

    protected $rules = [

        'prefa.pre_observacion'=>'required',
        'prefa.pre_precio'=>'required|numeric|min:1|max:10000'
    ];

    protected $messages = [
        'prefa.pre_observacion.required' => 'El campo observacion es obligatorio',
        'prefa.pre_precio.required' => 'El campo precio es obligatorio',
        'prefa.pre_precio.min' => 'El precio debe ser mayor a 0',
        'prefa.pre_precio.max' => 'El precio debe ser menor a 10000',
    ];

    public function findPrefabricado($idPre,$eventName){

         $this->prefa = Prefabricado::where('pre_id',$idPre)->join('tbl_capa','tbl_prefabricado.capa_id','=','tbl_capa.capa_id')
                    ->join('tbl_color','tbl_prefabricado.color_id','=','tbl_color.color_id')
                    ->join('tbl_dimension','tbl_prefabricado.dimension_id','=','tbl_dimension.dimension_id')
                    ->join('tbl_espesor','tbl_prefabricado.espesor_id','=','tbl_espesor.espesor_id')
                    ->join('tbl_resistencia','tbl_prefabricado.resistencia_id','=','tbl_resistencia.resistencia_id')
                    ->join('tbl_tipo','tbl_prefabricado.tipo_id','=','tbl_tipo.tipo_id')
                    ->join('tbl_unidad','tbl_prefabricado.unidad_id','=','tbl_unidad.unidad_id')
                    ->first();
        if($eventName=='edit'){

            $this->emit('preFindedToEdit');

        }elseif($eventName=='view'){

            $this->emit('preFindedToView');

        }else{

            $this->emit('preFindedToDestroy');

        }

    }

    public function destroyPrefabricado(){

        $preToDestroy = Prefabricado::find($this->prefa->pre_id);
        Storage::delete($preToDestroy->pre_image_path);
        $preToDestroy->delete();
        $prefabricado = new Prefabricado();
        $this->prefa = $prefabricado;
        $this->emit('preDestroyed');
        $this->emit('itemDestroyed');
        $this->destroyBanner = true;

    }

    public function editPrefabricado(){

        $this->validate();

        $isEdited = false;

        $imageName =  $this->prefa->pre_descripcion."_".substr($this->prefa->pre_image_path,-14);

         if($this->image){

            $this->prefa->pre_image_path = $this->image->storeAs('img/prefabricados',$imageName); 
         }
        
        $isEdited = $this->prefa->save();

        if($isEdited){

            $this->prefa->pre_importe = $this->prefa->pre_precio * $this->prefa->pre_stock; 
            $this->prefa->save();
        }

        $this->reset('image');
        $this->emit('preEdited');
        $this->emit('itemEdited');
            
    }

    public function updateStatus($preId){

        $preToUpdate = Prefabricado::find($preId);
        
        if ($preToUpdate->pre_status == "A") 
        {
            $preToUpdate->pre_status = "I";

        }else{

            $preToUpdate->pre_status = "A";
        }

        $preToUpdate->save();
    }

    public function render()
    {

        return view('livewire.prefabricado.show-pre',[

            'prefabricados'=>Prefabricado::join('tbl_capa','tbl_prefabricado.capa_id','=','tbl_capa.capa_id')
                            ->join('tbl_color','tbl_prefabricado.color_id','=','tbl_color.color_id')
                            ->join('tbl_dimension','tbl_prefabricado.dimension_id','=','tbl_dimension.dimension_id')
                            ->join('tbl_espesor','tbl_prefabricado.espesor_id','=','tbl_espesor.espesor_id')
                            ->join('tbl_resistencia','tbl_prefabricado.resistencia_id','=','tbl_resistencia.resistencia_id')
                            ->join('tbl_tipo','tbl_prefabricado.tipo_id','=','tbl_tipo.tipo_id')
                            ->join('tbl_unidad','tbl_prefabricado.unidad_id','=','tbl_unidad.unidad_id')
                            ->orderBy('pre_id','desc')
                            ->paginate(5),
            'tipos' => Tipo::all()->where('tipo_pro_id','1'),
            'colores' => Color::all(),
            'espesores' => Espesor::all(),
            'resistencias' => Resistencia::all(),
            'dimensiones' => Dimension::all(),
            'capas' => Capa::all(),
            'unidades' => Unidad::all()->where('tipo_pro_id','1'),
            'preCount'=> $this->preCount = DB::table('tbl_prefabricado')->count()
        ]);
    }
}

