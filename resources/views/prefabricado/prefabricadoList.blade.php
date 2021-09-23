@extends('adminlte::page')

@section('title', 'Prefabricado')

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
    </div>
    @livewire('show-pre')
    
   
  </x-app-layout>


@stop

@section('css')
   
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

    </script>

    {{-- <script>
        const setup = () => {
            return {
                var : false
            }
        }
    </script> --}}

<script>
  Livewire.on('addFeature',()=>{
    
    document.getElementById('addfeatureModal').showModal();
    
    }
  )

  Livewire.on('featureAdded',()=>{
    
    document.getElementById('addfeatureModal').close();
    
    }
  )

</script>




@stop
