@extends('adminlte::page')

@section('title', 'Materiales')

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

            <div class="px-2">
        
                <form action="{{ route('pdfMaterial',['action'=>"download"])  }}" method="get">
    
                    <button  type="submit" class="inline-flex items-center px-2 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    
                        <i class="far fa-file-pdf text-lg text-white"></i>
            
                    </button>
                    
                </form>
    
            </div>

            <div class="px-2">
        
                {{-- <form action="{{ route('pdfMaterial',['action'=>"view"])  }}" method="get">
    
                    <button  type="submit" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
            
                    </button>
                    
                </form> --}}

                <a  href="{{ route('pdfMaterial',['action'=>"view"])  }}" 
                    class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" 
                    target="_blank"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
    
                </a>

    
            </div>

            @livewire('create-qr',['queryType'=>'material'])

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

    const onChangeSelect = (data)=>{

        let selectId = data.id;
        let select = document.getElementById(selectId);


        if (select.value == 'default') {
            
            Livewire.emit('reset',selectId);
        }

    }

    const showQrModal = ()=>{

        document.getElementById('createQr').showModal();

    }

    
  
  </script>

  
@stop



