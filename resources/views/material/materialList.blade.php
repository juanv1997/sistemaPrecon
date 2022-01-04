@extends('adminlte::page')

@section('title', 'Prefabricado')

@section('content_header')
    <center>
        <h1>Lista de materiales</h1>
    </center>
@stop

@section('content')

    <x-app-layout>
    

        @livewire('message-banners')
        <div class="inline-flex ">
            
            @livewire('add-material')
            
            @livewire('add-feature',['tipoProducto'=>'material'])

            <form action="{{ route('excelMaterial')  }}" method="get">
                <button  type="submit" class="inline-flex items-center px-2 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    <i class="far fa-file-excel text-lg text-white"></i>
                </button>
            </form>
        </div>
        @livewire('show-material')
        
        

    </x-app-layout>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}

        <style>              
            .test-checkbox:checked {
                box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.2); 
            @apply: right-0 border-green-400;
            left: 0;
            border-color: #68D391;
            }
            .test-checkbox:checked + .test-label {
                box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.2);
                @apply: bg-green-400;
            background-color: #68D391;
            }
        </style>
@stop

@section('js')
    
    <script>
         Livewire.on('materialAdded', ()=> {

             document.getElementById('addMaterialModal').close();

            }
        )
    </script>
     <script>

        function editMaterial(data) {

            var id = data.id.substring(5);
            Livewire.emit('findMaterial',id,'edit');

        }

        function destroyMaterial(data) {

            var id = data.id.substring(8);
            Livewire.emit('findMaterial',id,'destroy');

        }

        function viewMaterial(data) {

            var id = data.id.substring(5);
            Livewire.emit('findMaterial',id,'view');

        }
   </script>

<script>

    Livewire.on('materialAdded', ()=> {

            document.getElementById('addMaterialModal').close();

        }
    )
    

    Livewire.on('materialFindedToEdit', function() {

        document.getElementById('editMaterialModal').showModal();

        }
    )

    Livewire.on('materialFindedToView', function() {

        document.getElementById('viewMaterialModal').showModal();

        }
    )

    Livewire.on('materialDestroyed', function() {

            document.getElementById('destroyMaterialModal').close();

        }
    )

    Livewire.on('materialEdited', function() {

document.getElementById('editMaterialModal').close();

}
)


    Livewire.on('materialFindedToDestroy', function() {

        document.getElementById('destroyMaterialModal').showModal();

        }
    )

    Livewire.on('sameFeature', function() {

        document.getElementById('sameFeature').showModal();

        }
    )

</script>


<script>
    Livewire.on('addFeature',()=>{
      
      document.getElementById('addfeatureModal').showModal();
      
      }
    )
  
    Livewire.on('featureAdded',()=>{
      
      document.getElementById('addfeatureModal').close();
      
      }
    )

    const updateStatus = (data)=>{

        let materialId = data.id

        Livewire.emit('updateStatus',materialId);

    }
  
  </script>

  
@stop



