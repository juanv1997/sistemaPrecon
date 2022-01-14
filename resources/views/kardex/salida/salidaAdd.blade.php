@extends('adminlte::page')

@section('title', 'Salida')

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
    
        let code = document.getElementById('txtCode') ;
        
        let codPro = code.value;

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

        //Livewire.emit('getStockProducto');

        searchTab.classList.add('hidden');

    } 

    txtCode.addEventListener('keyup',function(e){

        let resultList = [];

        let code = txtCode.value.toUpperCase();

        let codeLength = code.length;

        let filter = searchFilter.value;

        let notFoundMsg = document.getElementById('notFoundMsg');

       

      //console.log('Codigo: ' + code);

      //console.log('Length del codigo :' + codeLength);
 
      //let cuentaLista = searchList.querySelectorAll('li') ;


      $('#searchList li').remove();

      //$("#searchList").children().slice(1, -1).remove()

      //searchList.remove();
        
    //       resultList.forEach( (result)=>{
            
    //             console.log('entro a borrrar');

    //             console.log('id');

    //            li = document.getElementById(result.id);

    //           console.log(li);

    //           li.remove();

    //    })

          
    //    console.log('Length de la lista des pues del metodo: '+cuentaLista.length);
       
        // Eliminando todos los hijos de un elemento

        // while (searchList.firstChild) {

        //     console.log('entro a borrrar');

        //     console.log(searchList.firstChild);

        //     searchList.removeChild(searchList.firstChild);

        // }

        // var lis = document.getElementsByTagName('li');

        // var nodos_a_eliminar = new Array();
    
        // function eliminar(){

        //     console.log('entro a eliminar');

        //     for (var i=0;i<lis.length;i++){
        //         nodos_a_eliminar[nodos_a_eliminar.length] = lis[i];
        //     }
        //     for (var j=0;j<nodos_a_eliminar.length;j++){
        //         nodos_a_eliminar[j].parentNode.removeChild(nodos_a_eliminar[j]);
        //     }
        // }


        // eliminar();


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
                //li.setAttribute('wire:click','getStockProducto');

                console.log(li);

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

    // searchTab.addEventListener( 'mouseover' ,()=>{

    //     console.log('entro a mouseover');

    //     searchTab.classList.remove('hidden');

    // })

   
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




