<div>

   {{$inputType}}
   
    <div class="py-4">

        <div class="bg-white shadow-xl flex-row rounded-lg border-2 border-gray-500">
            
            <div class="flex space-x-3 p-3 justify-center font-semibold">

                <span >Seleccionar por : </span>

                {{-- <ul id="tabs" class="inline-flex h-11 w-72 text-gray-600 "   >
                    <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50" ><a wire:model="inputType" id="default-tab" href="#producto" onclick="changeToProduct()">Producto</a></li>
                    <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#codigo" onclick="changeToCode()">Codigo</a></li>
                </ul> --}}

                <select id="cbOption" onchange="changeOption()" wire:model.defer="inputType">

                    <option value="product" selected>Producto</option>
                    <option value="code">Codigo</option>

                </select>

            </div>
    
            {{-- <div id="tab-contents" wire:ignore.self> --}}
            
                <div id="product" class="p-4" wire:ignore.self>

                    <div  class="-mx-2 md:flex mb-3">

                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">


                                    <select  class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbTipo"  wire:model="tipoProducto"  onchange="resetToDefault()" >

                                        <option value="Prefabricado" selected>Prefabricado</option>
                                        <option value="Material">Material</option>


                                    </select>


                                </div>

                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">


                                    <select  id="cbPro" class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker rounded"  wire:model.defer="producto"  onchange="getStockPro()">

                                        
                                            <option value="default" selected>Seleccione una opcion</option>
                                        
                                        
                                        @if ($tipoProducto == "Prefabricado")
                                            
                                        
                                            @foreach ($prefabricados as $prefabricado)

                                                @if ($prefabricado->pre_stock > 0)

                                                    <option value="{{$prefabricado->pre_descripcion}}">{{$prefabricado->pre_descripcion}}-{{ $prefabricado->pre_stock  }} </option> 
                                                
                                                @endif
            
                                            @endforeach
                                        @endif


                                        @if ($tipoProducto == "Material")
                                            @foreach ($materiales as $material)

                                                @if ($material->material_stock > 0)

                                                    <option value="{{$material->material_descrip}}" >{{$material->material_descrip}}</option>
                                                
                                                @endif

                                            @endforeach
                                        @endif



                                    </select>

                                    

                                    <x-jet-input-error for="producto"/>

                                </div> 

                                
                                @livewire('inventario-count')   
                                 

                                <div  class="md:w-1/2 px-3 mb-6 md:mb-0">

                                    <input  type="number" min="1"  step="1" placeholder="Número de items" id="txtNumberPro"
                                    class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" wire:model.defer="cantidadPro">

                                    <x-jet-input-error for="cantidadPro"/>

                                </div>

                    </div>

                    <div class="text-center">

                        <x-button-loading >
                            <x-slot name="targetMethod">
                               addItemByPro
                            </x-slot>
                            <x-slot name="message">  
                                
                            </x-slot>
                        </x-button-loading>
        
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-medium text-sm text-white  tracking-widest transform hover:scale-105 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"  
                                    id="btnAddPro"
                                    wire:loading.remove 
                                    wire:click="addItemByPro" 
                                    disabled
                                    {{-- @if($buttonActivated)
                                        disabled
                                    @endif --}}
                        >
                        
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 px-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
        
                            Agregar
        
                        </button>
        
                    </div>

                </div>

                <div id="code" class="hidden p-4" wire:ignore.self>
                           
                    <div class="mx-8 md:flex mb-3 justify-center">

                                <x-jet-button onclick="getStockCod()" >

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>

                                    <span>Verificar stock</span>

                                </x-jet-button>
                                
                                <div  class="md:w-1/3 px-3 ">

                                    <input type="text" placeholder="Ingrese el código del producto" id="btn_stock"
                                            wire:model.defer="codigo"
                                            class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent">
                                    <x-jet-input-error for="codigo"/>

                                </div>


                                    @livewire('inventario-count')  

                            

                                <div  class="md:w-1/3 px-3" >

                                    <input  type="number" min="1" step="1" placeholder="Número de items" id="txtNumberCod"
                                            wire:model.defer="cantidadCod"
                                            class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent">
                                    <x-jet-input-error for="cantidadCod"/>

                                </div>

                            </div>

                            <div class="text-center">

                                <x-button-loading >
                                    <x-slot name="targetMethod">
                                        addItemByCode
                                    </x-slot>
                                </x-button-loading>
                
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-medium text-sm text-white  tracking-widest transform hover:scale-105 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"  
                                            id="btnAddCod"
                                            wire:loading.remove 
                                            wire:click="addItemByCode" 
                                             
                                            {{-- @if($buttonActivated)
                                                disabled
                                            @endif --}}
                                >
                                
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 px-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                
                                    Agregar
                
                                </button>
                
                                {{-- <x-jet-button wire:loading.remove id="btnAddPro" wire:click="{{$addMethod}}" >
                
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 px-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Agregar
                
                                </x-jet-button> --}}
                            </div>
                        
                </div> 

           

        </div>

    </div>


   

    {{-- <div class='py-4'>
        <div class="bg-white shadow-xl flex-row rounded-lg border-2 border-gray-500">
            
              <div class="p-2">

                <div class="flex  space-x-3 p-3 justify-center font-semibold">

                    <span >Seleccionar por : </span>

                    <span> Código</span>

                    <input wire:click="changeSelect('byCode')"   name="rbSearch" type="radio" class="form-radio h-5 w-5 text-gray-600" value="code" >

                    <span>Producto</span>

                    <input wire:click="changeSelect('byProduct')"   name="rbSearch" type="radio" class="form-radio h-5 w-5 text-gray-600" value="product" checked >


                </div>

                

                @if ($byProduct)
                    
                    <div  class="-mx-2 md:flex mb-3">

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">


                            <select  class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbTipo"  wire:model="tipoProducto"  onchange="resetToDefault()" >

                                <option value="Prefabricado">Prefabricado</option>
                                <option value="Material">Material</option>


                            </select>


                        </div>

                         <div class="md:w-1/2 px-3 mb-6 md:mb-0">


                            <select  id="cbPro" class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker rounded"  wire:model.defer="producto"  onchange="getStockPro()">

                                
                                    <option value="default">Seleccione una opcion</option>
                                
                                
                                @if ($tipoProducto == "Prefabricado")
                                    
                                
                                    @foreach ($prefabricados as $prefabricado)

 
                                        <option value="{{$prefabricado->pre_descripcion}}">{{$prefabricado->pre_descripcion}}-{{ $prefabricado->pre_stock  }} </option> 
                                       
                                
                                    @endforeach
                                @endif


                                @if ($tipoProducto == "Material")
                                    @foreach ($materiales as $material)

                                        <option value="{{$material->material_descrip}}" >{{$material->material_descrip}}</option>

                                    @endforeach
                                @endif



                            </select>
                            <x-jet-input-error for="producto"/>

                        </div> 

                         @livewire('inventario-count')  
                      

                         

                        <div  class="md:w-1/2 px-3 mb-6 md:mb-0">

                            <input  type="number" min="1"  step="1" placeholder="Número de items" id="txtNumberPro"
                            class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" wire:model.defer="cantidadPro">

                            <x-jet-input-error for="cantidadPro"/>

                        </div>

                    </div>

                   

                @endif

               
                @if ($byCode)
                    
                
                    <div x-show="!byProduct" class="mx-8 md:flex mb-3 justify-center">

                        <x-jet-button onclick="getStockCod()" >

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span>Verificar stock</span>

                        </x-jet-button>
                        
                        <div  class="md:w-1/3 px-3 ">

                            <input type="text" placeholder="Ingrese el código del producto" id="btn_stock"
                                    wire:model.defer="codigo"
                                    class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent">
                            <x-jet-input-error for="codigo"/>

                        </div>


                            @livewire('inventario-count')  

                       

                        <div  class="md:w-1/3 px-3" >

                            <input  type="number" min="1" step="1" placeholder="Número de items" id="txtNumberCod"
                                    wire:model.defer="cantidadCod"
                                    class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent">
                            <x-jet-input-error for="cantidadCod"/>

                        </div>

                    </div>

                @endif



                <div class="text-center">

                    <x-button-loading >
                        <x-slot name="targetMethod">
                            {{$addMethod}}
                        </x-slot>
                        <x-slot name="message">  
                            
                        </x-slot>
                    </x-button-loading>

                   <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-medium text-sm text-white  tracking-widest transform hover:scale-105 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"  
                            id="btnAddPro"
                            wire:loading.remove 
                            wire:click="{{$addMethod}}" 
                            @if($buttonActivated)
                                disabled
                            @endif
                    >
                
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 px-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Agregar

                   </button>

                   
                </div>


              </div>
            </div>
    </div> --}}

</div>

