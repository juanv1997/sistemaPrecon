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

class ShowPre extends Component
{
    use WithPagination;
    use WithFileUploads;


    public $openModal = false;
    protected $listeners = ['preAdded'=>'render','findPrefabricado'];
    public $val=5;
    public Prefabricado $prefa,$pre;
    public $image;
    public $destroyBanner = false;
    public $editBanner = false;
    public $preCount = 0;


    protected $rules = [

        'prefa.pre_observacion'=>'required',
        'prefa.pre_precio'=>'required',
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
        $preToDestroy->delete();
        $prefabricado = new Prefabricado();
        $this->prefa = $prefabricado;
        $this->emit('preDestroyed');
        $this->emit('itemDestroyed');
        $this->destroyBanner = true;

    }

    public function editPrefabricado(){

        $this->validate();

        $imageName = $this->prefa->pre_image_path;

         if($this->image){

            $this->prefa->pre_image_path = $this->image->storeAs('img/materiales',$imageName); 
         }
        
        $this->prefa->save();
        $this->reset('image');
        $this->emit('preEdited');
        $this->emit('itemEdited');
            
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

