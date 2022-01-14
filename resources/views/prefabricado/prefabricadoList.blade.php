@extends('adminlte::page')

@section('title', 'Prefabricados')

@section('content_header')

            <center>
                <h1>Lista de prefabricados</h1>
            </center>

@stop

@section('content')

  <x-app-layout>

    @livewire('message-banners')

    <div class="inline-flex">

        
        @livewire('add-pre')
        

        @livewire('add-feature',['tipoProducto'=>'pre'])

        <form action="{{ route('excelPre')  }}" method="get">

            <button  type="submit" class="inline-flex items-center px-2 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
               
                <i class="far fa-file-excel text-lg text-white"></i>

            </button>
            
        </form>

        <div class="px-2">
        
            <form action="{{ route('pdfPre' , ['action'=>"download"] ) }}" method="get">

                <button  type="submit" class="inline-flex items-center px-2 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                
                    <i class="far fa-file-pdf text-lg text-white"></i>
        
                </button>
                
            </form>

        </div>

        <div class="px-2">
        
            {{-- <form action="{{ route('pdfPre',['action'=>"view"]) }}" method="get">

                <button  type="submit" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
        
                </button>
                
            </form> --}}

            <a  href="{{ route('pdfPre',['action'=>"view"]) }}" 
                class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" 
                target="_blank"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>

            </a>


        </div>

        @livewire('create-qr',['queryType'=>'prefabricado'])

    </div>

    @livewire('show-pre')
    
   
  </x-app-layout>


@stop

@section('css')

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
   
    {{-- <script >

         function getDataEdit(attributes) {

           var id = attributes.id;
           var btnEdit = document.getElementById(id);
           var cod = btnEdit.dataset.cod,
               tipo = btnEdit.dataset.tipo,
               color = btnEdit.dataset.color,
               espesor = btnEdit.dataset.espesor,
               resistencia = btnEdit.dataset.resistencia,
               capa = btnEdit.dataset.capa,
               dimension = btnEdit.dataset.dimension,
               precio = btnEdit.dataset.precio,
               unidad = btnEdit.dataset.unidad,
               descripcion = btnEdit.dataset.descripcion;


            document.getElementById("idEdit").value = id;
            document.getElementById("codigo").value = cod;
            document.getElementById("descripcion").value = descripcion;
            document.getElementById("tipo").value = tipo;
            document.getElementById("color").value = color;
            document.getElementById("espesor").value = espesor;
            document.getElementById("resistencia").value = resistencia;
            document.getElementById("capa").value = capa;
            document.getElementById("dimension").value = dimension;
            document.getElementById("precio").value = precio;
            document.getElementById("unidad").value = unidad;


        }

        function getDataDestroy(attributes) {

            var id = attributes.id;

            document.getElementById("idDestroy").value = id;

        }

    </script>
    <script>

            @if (isset($_GET['procedure']))

                    @if ($_GET['procedure']=='destroy' )

                        $(document).ready(function () {

                            $('#toastDestroy').toast('show');
                        });

                    @endif

                    @if ($_GET['procedure']=='edit' )

                        $(document).ready(function () {

                            $('#toastEdit').toast('show');
                        });

                    @endif

                    @if ($_GET['procedure']=='store' )

                        $(document).ready(function () {

                            $('#toastStore').toast('show');
                        });


                    @endif


            @endif


    </script> --}}

    <script>


        function editPre(data) {

            var id = data.id.substring(5);
            Livewire.emit('findPrefabricado',id,'edit');

        }

        function destroyPre(data) {

            var id = data.id.substring(8);
            Livewire.emit('findPrefabricado',id,'destroy');

        }

        function viewPre(data) {

            var id = data.id.substring(5);
            Livewire.emit('findPrefabricado',id,'view');

        }

   </script>

    <script>

        Livewire.on('preAdded', ()=> {

                document.getElementById('addPreModal').close();

            }
        )
        
        Livewire.on('preDestroyed', function() {

                 document.getElementById('destroyPreModal').close();

             }
         )

          Livewire.on('preEdited', function() {

            document.getElementById('editPreModal').close();


     })

        Livewire.on('preFindedToEdit', function() {

            document.getElementById('editPreModal').showModal();

            }
        )

        Livewire.on('preFindedToView', function() {

            document.getElementById('viewPreModal').showModal();

            }
        )

        Livewire.on('preFindedToDestroy', function() {

            document.getElementById('destroyPreModal').showModal();

            }
        )

        Livewire.on('sameFeature', function() {

            document.getElementById('sameFeature').showModal();

            }
        )

        Livewire.on('sameProduct', function() {

            document.getElementById('sameProduct').showModal();

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

        Livewire.on('setParameters',()=>{

            let mainData = document.getElementById('mainData');

            mainData.classList.remove('hidden');

        })

        const onChangeSelect = (data)=>{

            let selectId = data.id;
            let select = document.getElementById(selectId);


            if (select.value == 'default') {
                
                Livewire.emit('reset',selectId);
            }

            if (selectId != "cbUnidad" && selectId != "cbDimension") {

    
                checkSetParameters();

            }

           

        }

        const checkSetParameters = () =>{

            let fillParameters = true;

            Livewire.emit('checkSetParameters',fillParameters);
                   
        }

        var inputDescrip = document.getElementById('txtDescrip');

        inputDescrip.onkeydown = function() {

            var key = event.keyCode || event.charCode;

            let txtDescripOriginal = document.getElementById('txtDescripOriginal').value;
            let txtDescrip = document.getElementById('txtDescrip').value;
            let posicion = document.getElementById('txtDescrip').selectionEnd;
            let descripLength = txtDescrip.length; 
           

            if(txtDescripOriginal == txtDescrip ){

                if( key == 8 || key == 46 ){
                    event.preventDefault();
                }

            }

            if (posicion != descripLength) {

                event.preventDefault();

            }
               
        };

        
        var inputCodigo = document.getElementById('txtCodigo');

        inputCodigo.onkeydown = function() {

            var key = event.keyCode || event.charCode;

            let txtCodigoOriginal = document.getElementById('txtCodigoOriginal').value;
            let txtCodigo = document.getElementById('txtCodigo').value;
            let posicion = document.getElementById('txtCodigo').selectionEnd;
            let codigoLength = txtCodigo.length; 


            if(txtCodigoOriginal == txtCodigo ){

                if( key == 8 || key == 46 ){
                    event.preventDefault();
                }

            }

             if (posicion != codigoLength) {

                 event.preventDefault();

             }
                
            
               
        };


        const updateStatus = (data)=>{

            let preId = data.id
        
            Livewire.emit('updateStatus',preId);

        }

        const showQrModal = ()=>{

            document.getElementById('createQr').showModal();

        }
   
    </script>




@stop
