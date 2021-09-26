<div>

    <div class='py-4'>
        <div class="bg-white shadow-xl flex-row rounded-lg border-2 border-gray-500">
            
              <div class="p-2">

                <div class="flex  space-x-3 p-3 justify-center font-semibold">

                    <span >Seleccionar por : </span>

                    <span> Código</span>

                    <input wire:click="changeSelect('byCode')"   name="rbSearch" type="radio" class="form-radio h-5 w-5 text-gray-600" value="code">

                    <span>Producto</span>

                    <input wire:click="changeSelect('byProduct')"   name="rbSearch" type="radio" class="form-radio h-5 w-5 text-gray-600" value="product" checked    >


                </div>

                {{-- Seccion de ingreso por producto --}}

                @if ($byProduct)
                    
                    <div  class="-mx-2 md:flex mb-3">

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">


                            <select  class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbTipo"  wire:model="tipoProducto"  >

                                <option value="Prefabricado">Prefabricado</option>
                                <option value="Material">Material</option>


                            </select>


                        </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">


                            <select  id="cbPro" class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker rounded"  wire:model.defer="producto" onchange="itemChanged()">

                                @if ($tipoProducto == "Prefabricado")
                                    @foreach ($prefabricados as $prefabricado)

                                        <option value="{{$prefabricado->pre_descripcion}}">{{$prefabricado->pre_descripcion}}</option>
                                       

                                    @endforeach
                                @endif


                                @if ($tipoProducto == "Material")
                                    @foreach ($materiales as $material)

                                        <option value="{{$material->material_descrip}}" >{{$material->material_descrip}}</option>

                                    @endforeach
                                @endif



                            </select>


                        </div>

                         @livewire('inventario-count')  
                        {{-- @if ($stockProducto!=0)
                            
                            <div class="flex space-x-7 justify-end ">

                                <div class="py-1 relative">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                    <div class="text-center absolute bg-gray-200 text-gray-800 font-bold w-6 h-6 text-lg leading-5 rounded-full -right-2 top-5 "> {{$stockProducto}} </div>
                                
                                </div>
                            </div>

                        @endif --}}

                        <div  class="md:w-1/2 px-3 mb-6 md:mb-0">

                            <input  type="number" min="1"  step="1" placeholder="Número de items" id="txtNumberPro"
                            class="appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" wire:model.defer="cantidadPro">

                        </div>

                    </div>

                @endif

                {{-- Sección de ingreso por código --}}

                @if ($byCode)
                    
                
                    <div x-show="!byProduct" class="mx-8 md:flex mb-3 justify-center">

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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 px-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Agregar
                    </x-jet-button>
                </div>


              </div>
            </div>
          </div>


   

</div>

