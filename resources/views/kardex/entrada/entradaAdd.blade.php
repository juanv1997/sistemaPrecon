@extends('adminlte::page')

@section('title', 'Entrada')

@section('content_header')
    <center>
        <h1>Entrada de producto</h1>
    </center>
@stop


@section('content')

    <x-app-layout>

       {{-- @livewire('list-products') --}}

        {{-- Card superior --}}

         @livewire('add-entrada') 


        {{-- Card inferior --}}


         @livewire('show-entrada')


    </x-app-layout>

@stop


@section('js')

    <script>

        Livewire.on('alert',function(){

            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 showConfirmButton: false,
                 timer: 3000,
                 timerProgressBar: false,
                 didOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                     toast.addEventListener('mouseleave', Swal.resumeTimer)
                 }
                 })

                 Toast.fire({
                 icon: 'success',
                 title: 'Entrada registrada con éxito'
                 })

                 document.getElementById('addEntrada').close();
                // $(document).ready(function () {

                //     $('#toastStore').toast('show');

                // });

        })

    </script>

    <script>
         function removeItem(data) {

             idItem = data.id;
             Livewire.emit('itemFinded',idItem);
         }
        // function destroyMaterialItem(data) {

        //     idItem = data.id;
        //     Livewire.emit('materialDestroyed',idItem);
        // }
        // function destroyPreItem(data) {

        //     idItem = data.id;
        //     Livewire.emit('preDestroyed',idItem);
        // }

        // function removeItem(data){

        //     var id = data.id;
        //     var itemType = data.dataset.type;
        //     Livewire.emit('itemFinded',id,itemType);

        // }

        Livewire.on('itemToRemove',()=>{

            document.getElementById('removeItem').showModal();

        });

        Livewire.on('itemRemoved',()=>{

            document.getElementById('removeItem').close();

        });

        function addEntrada() {
            
            document.getElementById('addEntrada').showModal();

        }

        

    </script>

@stop




