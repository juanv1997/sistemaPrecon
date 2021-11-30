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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        
        let productoToggle = document.getElementById('productoToggle');

        let dateToggle = document.getElementById('dateToggle');

        productoToggle.addEventListener("change", filterChanged, false);

        dateToggle.addEventListener("change", filterChanged, false);


        function filterChanged(){

            dateView = document.getElementById('date')
            productView = document.getElementById('product')
            productFilter = document.getElementById('productoToggle')
            dateFilter = document.getElementById('dateToggle')

            if (productFilter.checked && !dateFilter.checked) {
                
                productView.classList.remove('hidden')
                dateView.classList.add('hidden')
                checkSelect()
 
            }else if (!productFilter.checked && dateFilter.checked) {
                
                dateView.classList.remove('hidden')
                product.classList.add('hidden')
                enabledButton()
            }
            else if (productFilter.checked && dateFilter.checked) {
                
                productView.classList.remove('hidden')
                dateView.classList.remove('hidden')
                checkSelect()
            }
            else {

                 productView.classList.add('hidden')
                 dateView.classList.add('hidden')
                 enabledButton()
            }
           
            
        }

        const validateSelect = ()=>{

            let productToggle = document.getElementById('productoToggle')
            let cbProduct = document.getElementById('cbProduct')

            if(productToggle.checked){

                Livewire.emit('reset');
                cbProduct.selectedIndex = 0
                disabledButton()
            }

        }
        
        const checkSelect = ()=>{

            let cbPro = document.getElementById('cbProduct')
    
            let descripPro = cbPro.value   
            

            if (descripPro != "default") {

                enabledButton()

            }else{

                disabledButton();

            }
        }

         const disabledButton = () => {

            let btnSearch = document.getElementById('btnSearch');
            
            btnSearch.disabled = true;

         }

         const enabledButton = () => {

            let btnSearch = document.getElementById('btnSearch');

             btnSearch.disabled = false;

         }    

    </script>
@stop