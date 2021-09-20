@extends('adminlte::page')

@section('title', 'Transacciones')



@section('content_header')
 
   <div class="flex justify-center">
    
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
      </svg>

    <h1>Transacciones</h1>

    </div>

@stop

@section('content')

    <x-app-layout>

        @livewire('transaction-filter')
        @livewire('all-transactions')
       
    </x-app-layout>    

@stop

@section('css')
    
@stop

@section('js')

    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        
        const productChanged = ()=>{

            try {

                
                 let cbProduct = document.getElementById('cbProduct')
                 let product = cbProduct.dataset.product
            
                // cbProduct.remove(0)}

                alert(product)


                Livewire.emit('productChanged',product)
                
                
            } catch (e) {
                

                console.log(e)
            }
            
        }

    </script>
@stop