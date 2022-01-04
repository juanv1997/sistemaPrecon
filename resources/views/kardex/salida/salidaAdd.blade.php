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

    Livewire.on('event',() => {

        alert('hola');

    });

    Livewire.on('itemExists',() => {
            
        
        document.getElementById('productExists').showModal();

    }); 

    Livewire.on('stockError',() => {
            
        
            document.getElementById('stockError' ).showModal();
    
        }); 

    function addSalida() {

        document.getElementById('addSalida').showModal();

    }
    Livewire.on('productNotExist',() => {

        document.getElementById('productNoExist').showModal();

    });


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
    
    // let cbPro = document.getElementById('cbPro')

    // let defaultOption = document.createElement('option')

    // defaultOption.text = "Seleccione una opcion"

    // defaultOption.value = "default"

    // cbPro.add(defaultOption,cbPro[0])

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

   const getStockCod = ()=>{
    
        let btn_stock = document.getElementById('btn_stock') ;
        
        let codPro = btn_stock.value;

        Livewire.emit('getStockCod',codPro);

   }

   const activateAddButton = ()=>{

        let btnAdd = document.getElementById('btnAddPro')
        
        btnAdd.disabled = false

        // if (btnAdd.disabled) {
        //     Livewire.emit('activateButton')
        // }
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

            //activateAddButton()

            if (descripPro != "default") {

                Livewire.emit('getStockPro',descripPro,tipoPro); 

            }else{

                //Livewire.emit('desactivateButton');
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

   const showSearchTab = ()=>{
    
        let searchTab = document.getElementById('searchTab')
        
        searchTab.classList.remove('hidden')

   }

   const hideSearchTab = ()=>{
    
        let searchTab = document.getElementById('searchTab')
        
        searchTab.classList.add('hidden')

   }



</script>




{{-- <script>



    let tabsContainer = document.querySelector("#tabs");

    let tabTogglers = tabsContainer.querySelectorAll("a");

    console.log(tabTogglers);

    tabTogglers.forEach(function(toggler) {

        toggler.addEventListener("click", function(e) {

            e.preventDefault();

            let tabName = this.getAttribute("href");

            let tabContents = document.querySelector("#tab-contents");

            for (let i = 0; i < tabContents.children.length; i++) {

                tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                
                if ("#" + tabContents.children[i].id === tabName) {
                
                    continue;

                }

                tabContents.children[i].classList.add("hidden");

            }

            e.target.parentElement.classList.add("border-gray-800", "border-b-4", "-mb-px", "opacity-100");
        
        });
    
    });

    document.getElementById("default-tab").click();

</script>    --}}

    

@stop




