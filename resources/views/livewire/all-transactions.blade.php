<div>
     {{-- {{$tipoTransaccion}}
    {{$tipoProducto}}
    {{$producto}}
    {{$dateBegin}}
    {{$dateEnd}}   --}}
    @php
        $productCount = 0;
    @endphp

    @foreach ($listItems as $item)

       @php
           $productCount++;
       @endphp

    @endforeach

   

<div class="py-4">
    <div class="bg-white shadow-xl flex-row rounded-lg border-2 border-gray-500 overflow-x-auto">
         
    
        @if ($productCount != 0)

        <div class="text-center py-2">
            <span >
                Mostrando resultados de : {{ $stringResult }}
            </span>
            
                @if ( ($dateIntervalToggle == 1 || $productoToggle == 1) && $productCount!= 0  )
                                <button  wire:click="createReport" type="button" class="inline-flex items-center px-2 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    <i class="far fa-file-excel text-lg text-white"></i>
                                </button>
                @endif
            
        </div>  
            
        <div wire:loading.remove  class='bg-white shadow-md rounded my-2 p-4'>
            <table class='min-w-max w-full table-auto'>
                <thead class="text-center">
                    <tr class='bg-gray-200 text-gray-600  text-sm leading-normal'>
    
                        <th class='py-3 px-6'>N°</th>
                        <th class='py-3 px-6'>Código</th>
                        <th class='py-3 px-6'>Descripción</th>
                        <th class='py-3 px-6'>Precio unitario</th>
                        <th class='py-3 px-6'>Cantidad</th>
                        <th class='py-3 px-6'>Total</th>
                        <th class='py-3 px-6'>Fecha</th>
                        <th class='py-3 px-6'>Hora</th>
                        
                        
                    </tr>
                    
        
                       
                    
                </thead>
                <tbody class='text-gray-600 text-sm font-light text-center'>
                   
                   
    
                     @if ($tipoProducto=="Prefabricado")
    
                        @php
                            $i=1;
                        @endphp
    
                        @foreach ($listItems as $producto)
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg border-b">
                                
                                <td class="py-3 px-6  whitespace-nowrap" >
                                   {{$i}}
                                </td>
    
                                <td class="py-3 px-6  whitespace-nowrap" >
                                    {{$producto->pre_codigo}}
                                </td>
    
                                <td class="py-3 px-6  whitespace-nowrap" >
                                    {{$producto->pre_descripcion}}
                                </td>
    
                                <td class="py-3 px-6  whitespace-nowrap" >
                                    {{$producto->pre_precio}}
                                </td>
    
                                <td class="py-3 px-6  whitespace-nowrap" >
                                    
                                    @if ($tipoTransaccion=="Entradas")
                                        {{$producto->entrada_cantidad}}
                                    @else
                                        {{$producto->salida_cantidad}}
                                    @endif
                                    
                                </td>
    
                                <td class="py-3 px-6  whitespace-nowrap" >
                                    @if ($tipoTransaccion=="Entradas")
                                    {{$producto->entrada_total}}
                                    @else
                                    {{$producto->salida_total}} 
                                    @endif
                                    
                                </td>
    
                                <td class="py-3 px-6  whitespace-nowrap" >
                                    @if ($tipoTransaccion=="Entradas")
                                    {{$producto->entrada_fecha}}
                                    @else
                                    {{$producto->salida_fecha}}
                                    @endif
                                   
                                </td>
    
                                <td class="py-3 px-6  whitespace-nowrap" >
                                    
                                    @if ($tipoTransaccion=="Entradas")
                                    {{$producto->entrada_hora_creacion}}
                                    @else
                                    {{$producto->salida_hora_creacion}}
                                    @endif
                                    
                                </td>
    
                            </tr>
    
                            @php
                                $i++;
                            @endphp
                        @endforeach
    
                    @endif
    
                    @if ($tipoProducto=="Material")
    
                        @php
                            $j=1;
                        @endphp
    
                        @foreach ($listItems as $producto)
                           
                                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg border-b">
                                
                                    <td class="py-3 px-6  whitespace-nowrap" >
                                       {{$j}}
                                    </td>
        
                                    <td class="py-3 px-6  whitespace-nowrap" >
                                        {{$producto->material_cod}}
                                    </td>
        
                                    <td class="py-3 px-6  whitespace-nowrap" >
                                        {{$producto->material_descrip}}
                                    </td>
        
                                    <td class="py-3 px-6  whitespace-nowrap" >
                                        {{$producto->material_precio}}
                                    </td>
        
                                    <td class="py-3 px-6  whitespace-nowrap" >
                                    
                                        @if ($tipoTransaccion=="Entradas")
                                            {{$producto->entrada_cantidad}}
                                        @else
                                            {{$producto->salida_cantidad}}
                                        @endif
                                        
                                    </td>
        
                                    <td class="py-3 px-6  whitespace-nowrap" >
                                        @if ($tipoTransaccion=="Entradas")
                                        {{$producto->entrada_total}}
                                        @else
                                        {{$producto->salida_total}} 
                                        @endif
                                        
                                    </td>
        
                                    <td class="py-3 px-6  whitespace-nowrap" >
                                        @if ($tipoTransaccion=="Entradas")
                                        {{$producto->entrada_fecha}}
                                        @else
                                        {{$producto->salida_fecha}}
                                        @endif
                                       
                                    </td>
        
                                    <td class="py-3 px-6  whitespace-nowrap" >
                                        
                                        @if ($tipoTransaccion=="Entradas")
                                        {{$producto->entrada_hora_creacion}}
                                        @else
                                        {{$producto->salida_hora_creacion}}
                                        @endif
                                        
                                    </td>
                            
    
                            @php
                                $j++;
                            @endphp
    
                        @endforeach
    
                    @endif 

                      
                   
                </tbody>
            </table>
    </div>
    @else

        <center>

            <div class="mb-8 py-4">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

                <span>
                    No se encontró ningún resultado para: {{$stringResult}}
                </span>

            </div>

        </center>
    
    @endif

    </div>




</div>


</div>

