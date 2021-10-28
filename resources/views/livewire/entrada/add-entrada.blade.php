<div>
    
     {{-- <div wire:offline>
        You are now offline.
    </div>  --}}
    
                <div class='py-4'>
                    <div class="bg-white shadow-xl flex-row rounded-lg border-2 border-gray-500">
                    
                      <div class="p-2">
        
                        <div class=" flex  space-x-3 p-3 justify-center font-semibold">
        
                            

                            <span >Seleccionar por : </span>

                            <span> Código</span>
        
                            <input wire:click="changeSelect('byCode')"   name="rbSearch" type="radio" class="form-radio h-5 w-5 text-gray-600" value="code">
        
                            <span>Producto</span>
        
                            <input wire:click="changeSelect('byProduct')"   name="rbSearch" type="radio" class="form-radio h-5 w-5 text-gray-600" value="product" checked    >
        
        
                        </div>
        
                        {{-- Seccion de ingreso por producto --}}
        
                        @if ($byProduct)
                            

                        <div  class="-mx-2 md:flex mb-3">
        
                            {{-- <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        
        
                                <select  class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbProducto"  wire:model="tipoProducto"  >
        
                                    <option value="Prefabricado">Prefabricado</option>
                                    <option value="Material">Material</option>
        
        
                                </select>
        
        
                            </div> --}}
        
                            {{-- <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        
        
                                <select  class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker rounded"  id="cbItem" wire:model.defer="producto">
        
                                   
        
                                    @if ($tipoProducto == "Prefabricado")
                                        @foreach ($prefabricados as $prefabricado)
        
                                            <option selected >{{$prefabricado->pre_descripcion}}</option>
                                        
                                        @endforeach
                                    @endif
        
        
                                @if ($tipoProducto == "Material")
                                    @foreach ($materiales as $material)
        
                                    <option  selected>{{$material->material_descrip}}</option>
        
                                    @endforeach
                                @endif
        
        
        
                                </select>
        
        
                            </div> --}}

                            <div class=" bg-white shadow-md rounded my-2 overflow-y-auto h-80 border-5 border-gray-500 "> 
           
                               
                                <div class="grid grid-cols-5 px-5 mt-10 overflow-y-auto ">
                                  
                                  @foreach ($prefabricados as $prefabricado)
                          
                                    <div class=" hover:bg-blue-200 transform hover:scale-110 transition-all duration-150  bg-blue-100 shadow  px-7 py-2 flex flex-col border border-gray-200 rounded-md h-40 justify-between">
                                        
                                        <div>
                                          <div class="font-bold text-gray-800">{{$prefabricado->pre_descripcion}}</div>
                                          <span class="font-light text-sm text-gray-400">{{$prefabricado->pre_stock}}</span>
                                        </div>
                          
                                        <div class="flex flex-row justify-between items-center">
                                          <img src="http://localhost/sistemaPrecon/storage/app/{{$prefabricado->pre_image_path}}" class=" h-12 w-12 object-cover rounded-md" >
                                        </div> 
                          
                                    </div>
                          
                                  @endforeach
                                 
                                </div>
                                <!-- end products -->
                            </div> 

                            {{-- <div  class="md:w-1/2 px-3 mb-6 md:mb-0">
        
                                <input  type="number" min="1"  step="1" placeholder="Número de items" id="txtNumberPro"
                                class="  appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" wire:model.defer="cantidadPro">
        
                            </div> --}}
        
                        </div>
                        @endif
                        {{-- Sección de ingreso por código --}}
        
                        @if ($byCode)
                            
                        
                            <div  class="mx-8 md:flex mb-3 justify-center">
            
                                <div  class="md:w-1/3 px-3 ">
            
                                <input type="text" placeholder="Ingrese el código del producto" id="txtNumberPro"
                                        wire:model.defer="codigo"
                                        class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent">
                                </div>
                                        <div  class="md:w-1/3 px-3" >
                                <input  type="number" min="1"  step="1" placeholder="Número de items" id="txtNumberCod"
                                        wire:model.defer="cantidadCod"
                                        class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent">
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
        
                            <x-jet-button wire:loading.remove id="btnAddPro"  wire:click="{{$addMethod}}">
                                
                                <svg  xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 px-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
        
                                <span>Agregar</span>
        
                            </x-jet-button>
                        </div>
        
                       
        
        
                      </div>
                    </div>
                  </div>
        
        
      
</div>
