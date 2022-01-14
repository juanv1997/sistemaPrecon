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

    //Buscador de entrada por codigo 

    const showSearchTab = ()=>{
        

        if (txtCode.value.length > 0) {

             searchTab.classList.remove('hidden')

        }else{

            searchTab.classList.add('hidden');

        }



   }

   const hideSearchTab = ()=>{
    

        if (!itemPressed) {

            searchTab.classList.add('hidden')
            
        }


   }

     window.addEventListener('click', (e)=> {
        
         if (!document.getElementById('txtCode').contains(e.target)) {
            
            searchTab.classList.add('hidden')

         } 
     })

 

    let txtCode = document.getElementById('txtCode');

    let searchList = document.getElementById('searchList');

    let searchFilter = document.getElementById('searchFilter');

    let searchTab = document.getElementById('searchTab');

    let itemPressed = false;

    let prefabricados = null;

    let materiales = null;

    


    window.onload = ()=>{

        Livewire.emit('getProducts');
 
    }

   Livewire.on('loadProducts',(prefabricadosList,materialesList) => {         
           
         prefabricados = prefabricadosList;

         materiales = materialesList;

         console.log(prefabricados);

         console.log(materiales);

     });


    const setCode = (data)=>{

        itemPressed = true;
        
        txtCode.value = data.dataset.code;

        Livewire.emit('setCode',data.dataset.code);
       
        searchTab.classList.add('hidden');

    } 

    txtCode.addEventListener('keyup',function(e){

        let resultList = [];

        let code = txtCode.value.toUpperCase();

        let codeLength = code.length;

        let filter = searchFilter.value;

        let notFoundMsg = document.getElementById('notFoundMsg');

       


      $('#searchList li').remove();

     


        if (codeLength > 0) {

            searchTab.classList.remove('hidden');

            if (filter == "todos") {
                

                materiales.forEach( (material) =>{ 

                    if (codeLength <= material.material_cod.length  ) {


                            if (code == material.material_cod.substring(0,codeLength)) {

                                resultList.push({
                                    "code" : material.material_cod,
                                    "descrip" : material.material_descrip,
                                    "id" : "li-material-"+material.material_id
                                });

                            }

                    }

                }) 

                prefabricados.forEach( (pre) =>{ 

                    if (codeLength <= pre.pre_codigo.length  ) {


                            if (code == pre.pre_codigo.substring(0,codeLength)) {

                                resultList.push({
                                    "code" : pre.pre_codigo,
                                    "descrip" : pre.pre_descripcion,
                                    "id" : "li-pre-"+pre.pre_id
                                });

                            }

                    }

                })

            }else{

                if (filter=="material") {

                    materiales.forEach( (material) =>{ 

                        if (codeLength <= material.material_cod.length  ) {

                                if (code == material.material_cod.substring(0,codeLength)) {

                                    resultList.push({
                                        "code" : material.material_cod,
                                        "descrip" : material.material_descrip,
                                        "id" : "li-material-"+material.material_id
                                    });

                                }

                        }

                    })
                    
                }else{

                    prefabricados.forEach( (pre) =>{ 

                        if (codeLength <= pre.pre_codigo.length  ) {

                                if (code == pre.pre_codigo.substring(0,codeLength)) {

                                    resultList.push({
                                        "code" : pre.pre_codigo,
                                        "descrip" : pre.pre_descripcion,
                                        "id" : "li-pre-"+pre.pre_id
                                    });

                                }

                        }

                    })


                }

            }

            resultList.forEach( (result) =>{ 

                let li = document.createElement('li');
                li.appendChild(document.createTextNode(result.code + "(" + result.descrip + ")"));
                li.setAttribute('class','p-2 hover:bg-gray-100 cursor-pointer');
                li.setAttribute('id',result.id);
                li.setAttribute('data-code',result.code);
                li.setAttribute('onclick','setCode(this)');
                searchList.appendChild(li);

            })

            if (resultList.length == 0) {

                notFoundMsg.classList.remove('hidden');
                

            }else{

                notFoundMsg.classList.add('hidden');

            }
                
        }else{

            notFoundMsg.classList.add('hidden');

            searchTab.classList.add('hidden');

        }
        

    })


</script>

@stop




