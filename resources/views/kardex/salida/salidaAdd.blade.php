@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
    <center>
        <h1>Salida de producto</h1>
    </center>
@stop


@section('content')

    <x-app-layout>

        {{-- Card superior --}}

        @livewire('add-salida')


        {{-- Card inferior --}}

        @livewire('show-salida')



    </x-app-layout>

@stop


@section('js')

<script>
     function removeItem(data) {

        idItem = data.id;
        Livewire.emit('itemFinded',idItem);
    }   

    Livewire.on('itemToRemove',()=>{

        document.getElementById('removeItem').showModal();

        });

        Livewire.on('itemRemoved',()=>{

        document.getElementById('removeItem').close();

        });

        function addSalida() {

        document.getElementById('addSalida').showModal();

        }


</script>

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
             title: 'Salida registrada con éxito'
             })

             document.getElementById('addSalida').close();

    })

</script>

<script>

    
   const getStockPro = ()=>{

    let cbPro = document.getElementById('cbPro') , cbTipo  = document.getElementById('cbTipo') ;
    
    let descripPro = cbPro.value, tipoPro = cbTipo.value;

    removeDefaultItem()

    Livewire.emit('getStockPro',descripPro,tipoPro);
    
   }

   const removeDefaultItem = () => {

        let cbPro = document.getElementById('cbPro')

        let firstOption = cbPro.options[0].value;

        if(firstOption == "default"){

            cbPro.remove(0);
            Livewire.emit('defaultItemRemoved');

        }
   }

//    const removeSelectedItem = () => {

//         let cbPro = document.getElementById('cbPro')    
//         let prodcuto = cbPro.selectedIndex

        
//         cbPro.remove(prodcuto)

//         alert("se dio click al boto de agrgar")
//         alert(prodcuto)

//    }

   const getStockCod = ()=>{
    
    let btn_stock = document.getElementById('btn_stock') ;
    
    let codPro = btn_stock.value;

    Livewire.emit('getStockCod',codPro);

   }

</script>



@stop




