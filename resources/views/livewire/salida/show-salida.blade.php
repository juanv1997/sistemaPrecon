<div>

    <x-modal-small>
     
        <x-slot name="colorIcon">blue-100</x-slot>

        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
        </x-slot>

        <x-slot name="action">false</x-slot>

        <x-slot name="cancel">false</x-slot>

        <x-slot name="targetMethodLoading"></x-slot>

        <x-slot name="loadingMessage">Procesando solicitud...</x-slot>

        <x-slot name="modalId">stockError</x-slot>

        <x-slot name="eventClick"></x-slot>

        <x-slot name="buttonText"></x-slot>

        <x-slot name="title">Stock insuficiente</x-slot>

        El stock del producto es insuficiente para agregarlo a la lista.


    </x-modal-small>

    <x-modal-small>
     
        <x-slot name="colorIcon">red-100</x-slot>

        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
        </x-slot>

        <x-slot name="action">false</x-slot>

        <x-slot name="cancel">false</x-slot>

        <x-slot name="targetMethodLoading"></x-slot>

        <x-slot name="loadingMessage">Procesando solicitud...</x-slot>

        <x-slot name="modalId">productNoExist</x-slot>

        <x-slot name="eventClick"></x-slot>

        <x-slot name="buttonText"></x-slot>

        <x-slot name="title">Producto inexistente</x-slot>

       No existe un producto con el código ingresado.


    </x-modal-small>

    <x-modal-small>
     
        <x-slot name="colorIcon">blue-100</x-slot>

        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
        </x-slot>

        <x-slot name="action">false</x-slot>

        <x-slot name="cancel">false</x-slot>

        <x-slot name="targetMethodLoading"></x-slot>

        <x-slot name="loadingMessage">Procesando solicitud...</x-slot>

        <x-slot name="modalId">productExists</x-slot>

        <x-slot name="eventClick"></x-slot>

        <x-slot name="buttonText"></x-slot>

        <x-slot name="title">Producto ya seleccionado</x-slot>

        El producto seleccionado ya esta en lista a egresar.


    </x-modal-small>

    <x-modal-small>
       
      <x-slot name="colorIcon">red-100</x-slot>

      <x-slot name="icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
      </x-slot>
 
       <x-slot name="action">true</x-slot>
 
       <x-slot name="cancel">true</x-slot>
 
       <x-slot name="targetMethodLoading">removeItem</x-slot>
 
       <x-slot name="loadingMessage">Cargando...</x-slot>
 
       <x-slot name="modalId">removeItem</x-slot>
 
       <x-slot name="eventClick">removeItem</x-slot>
 
       <x-slot name="buttonText">Quitar</x-slot>
 
       <x-slot name="title">Quitar item de la lista</x-slot>
 
        ¿Seguro de remover el item {{$itemDescrip}} de la lista?
 
   </x-modal-small> 

   <x-modal-small>

       
      <x-slot name="colorIcon">red-100</x-slot>

      <x-slot name="icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
      </x-slot>
 
       <x-slot name="action">true</x-slot>
 
       <x-slot name="cancel">true</x-slot>
 
       <x-slot name="targetMethodLoading">addSalida</x-slot>
 
       <x-slot name="loadingMessage">Cargando...</x-slot>
 
       <x-slot name="modalId">addSalida</x-slot>
 
       <x-slot name="eventClick">addSalida</x-slot>
 
       <x-slot name="buttonText">Agregar</x-slot>
 
       <x-slot name="title">Agregar salida</x-slot>
 
        ¿Seguro de agregar la salida?
 
   </x-modal-small>

   @php
       $pre = 0;
       $materiales = 0;
   @endphp
   
   @empty(!$productos)
       @if (count($productos)!=0)
           
           @foreach ($productos as $producto)
               
           @foreach ( $producto as $item=>$value)
               
               @if ($value=="pre")
                   @php
                   $pre++;  
                   @endphp
               @endif
               @if ($value=="material")
                   @php
                       $materiales++;
                   @endphp
               @endif

           @endforeach

           @endforeach

       @endif
   @endempty

   


   <div class="bg-white shadow-2xl flex-row rounded-lg border-2 border-gray-500 ">

    <div class="  p-2 bg-gray-800 text-white rounded-t">
               <center >

                   <span>
                       Productos a egresar
                   </span>
               </center>
               @empty (!$productos)

                   @if (count($productos)!=0)
                   <div class="flex space-x-7 justify-end ">

                       <div class="px-3 relative">
                           <!-- cart icon -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                           </svg>
                           <div  class="text-center absolute bg-gray-200 text-gray-800 font-bold w-5 h-5 text-xs p-0 leading-5 rounded-full -right-2 top-3">{{count($productos)}} </div>
                       </div>

                   </div>
                   @endif

               @endempty
           </div>

           <div class="rounded-lg shadow-2xl px-11 py-4">
               @if ($pre!=0)

               <center >
                   <span>
                       Prefabricados
                   </span>
               </center>
               <div class='bg-white shadow-md rounded my-2 overflow-y-auto h-64 border-5 border-gray-500'>


                      
                <table class='min-w-max w-full border-collapse border '>
                           <thead class="text-center">
                               <tr class='bg-gray-200 text-gray-600  text-sm leading-normal'>
                                   <th class='py-3 px-6'>N°</th>
                                   <th class='py-3 px-6'>Código</th>
                                   <th class='py-3 px-6'>Descripción</th>
                                   <th class='py-3 px-6'>Precio unitario</th>
                                   <th class='py-3 px-6'>Cantidad</th>
                                   <th class='py-3 px-6'>Precio total</th>
                                   <th class='py-3 px-6'>Descartar</th>
                               </tr>
                           </thead>
                           <tbody class="text-gray-600 text-sm font-light text-center ">

                               @php
                                   $i = 1;
                               @endphp

                               @foreach ($productos as $producto=>$info )

                                   @if ( $info['tipo']=="pre")
                               
                                       <tr class='border-b border-gray-200 hover:bg-gray-100'>
                                           <td class="py-3 px-6  whitespace-nowrap">{{$i}}</td>
                                           @foreach ($info as $content)

                                                   @if ($content!="pre")
                                                       <td class="py-3 px-6  whitespace-nowrap">{{$content}}</td>  
                                                   @endif    
   
                                           @endforeach 

                                           @php
                                               $i++;
                                           @endphp

                                           <td class="py-3 px-6 whitespace-nowrap">
                                           
                                               <button id="{{$producto}}" data-type="pre" onclick="removeItem(this)" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm racking-widest hover:bg-gray-400 bg-gray-200 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                   </svg>
                                               </button>     
                                           
                                           </td>
                                       </tr>
                                   @endif
                               @endforeach

                           </tbody>
                       </table>

                      
                   </div>

           @endif

           {{-- @endempty --}}

           
           {{-- @empty(!$materialList) --}}
               
           @if ($materiales!=0)
               
           
               <center >
                   <span>
                       Materiales
                   </span>
               </center>
               <div class="bg-white shadow-md rounded my-2 overflow-y-auto h-64 border-5 border-gray-500 " >          
               <table class='min-w-max w-full border-collapse border'>
                   <thead class="text-center">
                       <tr class='bg-gray-200 text-gray-600  text-sm leading-normal'>
                           <th class='py-3 px-6'>N°</th>
                           <th class='py-3 px-6'>Código</th>
                           <th class='py-3 px-6'>Descripción</th>
                           <th class='py-3 px-6'>Precio unitario</th>
                           <th class='py-3 px-6'>Cantidad</th>
                           <th class='py-3 px-6'>Precio total</th>
                           <th class='py-3 px-6'>Descartar</th>
                       </tr>
                   </thead>
                   <tbody class="text-gray-600 text-sm font-light text-center ">

                       @php
                           $i = 1;
                           
                       @endphp

                       @foreach ($productos as $producto => $info)

                       @if ( $info['tipo']=="material")
                           <tr class='border-b border-gray-200 hover:bg-gray-100'>
                               <td class="py-3 px-6  whitespace-nowrap">{{$i}}</td>
                               @foreach ($info as $content)
                               @if ($content!="material")
                                   
                                   <td class="py-3 px-6  whitespace-nowrap">{{$content}}</td>
                                   @if ($content=="cantidad")

                                   
                                       
                                   @endif

                               @endif        
                               
                               @endforeach

                               @php
                                   $i++;
                               @endphp

                               <td class="py-3 px-6  whitespace-nowrap">
                               {{--
                                   <button id="" onclick="" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm racking-widest hover:bg-gray-400 bg-gray-200 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                       </svg>
                                   </button> --}}
                                   <button id="{{$producto}}"  onclick="removeItem(this)" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm racking-widest hover:bg-gray-400 bg-gray-200 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                       </svg>
                                   </button>
                                   {{-- <button id="" onclick="" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm racking-widest hover:bg-gray-400 bg-gray-200 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                       </svg>
                                   </button> --}}

                               </td>
                           </tr>
                       @endif
                       @endforeach

                   </tbody>
               </table>
               </div>
           @endif

           @empty($productos)

           <center>

                   <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                   </svg>
                   <span >
                       No se ha ingresado ningún producto
                   </span>
           </center>

       @endempty
               @empty(!$productos)
                   <div class="py-3">
                       <center>
                           <x-jet-button  onclick="addSalida()" >

                               <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 px-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                               </svg>

                               Guardar salida

                           </x-jet-button>
                       </center>
                   </div>

               @endempty



           </div>

       </div>
   

   <x-loading>
       <x-slot name="targetMethod">
           addSalida
       </x-slot>
       <x-slot name="message">
           Procesando solicitud...
       </x-slot>
   </x-loading>
   


</div>

