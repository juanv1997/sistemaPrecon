<div>
   
   <div class="bg-white shadow-xl flex-row rounded-lg border-2 border-gray-500 overflow-x-auto">
                    
    <div class="p-2">

        {{-- {{$test}} --}}
        <div class="flex space-x-3 p-3 justify-center font-semibold">

            <span>Filtros:</span>

            <span>Fecha</span>

            <x-toggle>
                <x-slot name="id">dateToggle</x-slot>  
                <x-slot name="prop">dateIntervalToggle</x-slot> 
                
            </x-toggle>

            <span>Producto</span>

            <x-toggle>
                <x-slot name="id">productoToggle</x-slot>    
                <x-slot name="prop">productoToggle</x-slot> 
                
            </x-toggle>

 
         </div>

        

      <div class=" flex space-x-3 justify-center font-semibold mb-3">
     
            {{-- <div class=" px-2 py-1 text-sm rounded ">
                <select class="rounded-full border bg-white border-gray-400 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"> 
                    <option>10</option>
                    <option>20</option>
                </select>  
            </div> --}}
    
            <div class=" px-2 py-1 text-sm rounded ">
                <select wire:model="tipoTransaccion" class="rounded-full border bg-white border-gray-400 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"> 
                    <option>Entradas</option>
                    <option>Salidas</option>
                </select>  
            </div>
    
            <div class=" px-2 py-1 text-sm rounded ">
                <select wire:model="tipoProducto" class="rounded-full border bg-white border-gray-400 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"> 
                    @foreach ($tipo_productos as $tipo)
                        <option value="{{$tipo->tipo_pro_nombre}}">{{$tipo->tipo_pro_nombre}}</option>
                    @endforeach
                </select>  
            </div>
            
            @empty(!$productoToggle) 
                <div class=" px-2 py-1 text-sm rounded ">
                    <select  wire:model="producto" data-product="{{$tipoProducto}}" class="rounded-full border bg-white border-gray-400 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  
                            @if ($defaultPre || $defaultMaterial)
                                onchange="productChanged()" 
                            @endif 
                            id="cbProduct"> 
                        
                        
                        

                        @if ($tipoProducto=="Prefabricado")

                        {{-- @if ($defaultPre)
                        
                            <option selected>Seleccione una opcion</option>

                        @endif  --}}
                        
                        @foreach ($productos as $producto)
                        
                            <option value="{{$producto->pre_id}}">{{$producto->pre_descripcion}}</option>
                                    
                        @endforeach
    
                    @endif
    
                    @if ($tipoProducto=="Material")

                        {{-- @if ($defaultMaterial)
                        
                        <option selected>Seleccione una opcion</option>

                        @endif  --}}
                        
                       
                        @foreach ($productos as $producto)
                            
                            <option value="{{$producto->material_id}}" selected>{{$producto->material_descrip}}</option>
                                  
                        @endforeach
    
                    @endif
                        
                    </select>  
                </div>
            @endempty
    

            @empty(!$dateIntervalToggle)
    
              
            <div class="flex">
                    
                <span class="py-2 px-1 justify-center text-base font-sans">
                    Desde
                </span>

                    <x-date-picker >
                        <x-slot name="id">dateBegin</x-slot>
                        <x-slot name="prop">dateBegin</x-slot> 
                        <x-slot name="value">{{ $dateDefault }}</x-slot>
                    </x-date-picker> 
            </div>
                
                
            @endempty
          
           
           @empty (!$dateIntervalToggle)
               
           <div class="flex">
                    
            <span class="py-2 px-1 justify-center text-base font-sans">
                hasta
            </span>
    
                    <x-date-picker>
                        <x-slot name="id">dateEnd</x-slot>
                        <x-slot name="prop">dateEnd</x-slot> 
                    </x-date-picker> 
                </div>
                
                
            @endempty

           
            
            
    
        

        

      </div>

      <div class="text-center">
        
        <x-jet-button wire:click="filter">
            Buscar
        </x-jet-button>

      </div>

      



    </div>
  </div>

</div>
