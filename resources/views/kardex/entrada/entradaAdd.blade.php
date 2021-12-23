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
        Livewire.on('itemExists',() => {
            
        
            document.getElementById('productExists').showModal();
    
        }); 
    
        Livewire.on('productNotExist',() => {
    
            document.getElementById('productNoExist').showModal();
    
        });
    



        

    </script>

<script>
    
    
    Livewire.on('render',()=>{

        let cbPro = document.getElementById('cbPro')
    
        let descripPro = cbPro.value    

        if (descripPro != "default") {

            activateAddButton()

        }else{

            disabledButton();
            resetCount(); 

        }

    })
    
    
   const getStockPro = ()=>{

    let cbPro = document.getElementById('cbPro') , cbTipo  = document.getElementById('cbTipo') ;
    
    let descripPro = cbPro.value, tipoPro = cbTipo.value;

    if (descripPro != "default") {

        Livewire.emit('getStockPro',descripPro,tipoPro); 
        activateAddButton()

    }else{

        disabledButton();
        resetCount(); 

    }
        
   }

    const resetCount = ()=>{

        Livewire.emit('resetCount');

    }

    const disabledButton = () => {

         let btnAdd = document.getElementById('btnAddPro');

         btnAdd.disabled = true;

    }

//    const getStockCod = ()=>{
    
//         let btn_stock = document.getElementById('btn_stock') ;
        
//         let codPro = btn_stock.value;

//         Livewire.emit('getStockCod',codPro);

//    }

   const activateAddButton = ()=>{

        let btnAdd = document.getElementById('btnAddPro')
        
        btnAdd.disabled = false
   }

    
    const changeOption = () =>{

        let inputType = ""

        productView = document.getElementById('product')
        codView = document.getElementById('code')
        cbOption = document.getElementById('cbOption')

        inputType = cbOption.value

        if (inputType == "product") {
            
            productView.classList.remove('hidden')
            code.classList.add('hidden')

        } else {
            
            productView.classList.add('hidden')
            code.classList.remove('hidden')

        }
        
        if (inputType == "code") {
            
            Livewire.emit('resetCount');
             
        }else{

            
            let cbPro = document.getElementById('cbPro') , cbTipo  = document.getElementById('cbTipo') ;
            
            let descripPro = cbPro.value, tipoPro = cbTipo.value;


            if (descripPro != "default") {

                Livewire.emit('getStockPro',descripPro,tipoPro); 

            }else{

                Livewire.emit('resetCount');
            }

        }

    }

    function copyToClipBoard() {

        var content = document.getElementById();

        content.select();
        document.execCommand('copy');

        alert("Copied!");
   }

</script>

@stop




