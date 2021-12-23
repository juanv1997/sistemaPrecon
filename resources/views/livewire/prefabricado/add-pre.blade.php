<div>

    <x-modal>

        <x-slot name="colorIcon">green-100</x-slot>

        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>
        </x-slot>

        <x-slot name="action">true</x-slot>

         <x-slot name="cancel">true</x-slot>
         
         <!--Loading-->

        <x-slot name="targetMethodLoading">addPrefabricado</x-slot>

        <x-slot name="loadingMessage">Procesando solicitud...</x-slot>

        <x-slot name="modalId">addPreModal</x-slot>

        <x-slot name="buttonText">Agregar</x-slot>

        <x-slot name="title">Nuevo prefabricado </x-slot>

            <div class="-mx-2 md:flex mb-3">

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-jet-label value="Tipo"/>

                    <select class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbTipo" onchange="onChangeSelect(this)" wire:model.defer="pre.tipo_id">

                        <option value="default">Seleccione una opción</option>

                        @foreach ($tipos as $tipo)

                            <option value="{{ $tipo->tipo_id}}">{{ $tipo->tipo_nombre }}</option>

                        @endforeach

                    </select>

                    <x-jet-input-error for="pre.tipo_id"/>



                </div>

                <div class="md:w-1/2 px-3">
                    <x-jet-label value="Color"/>

                    <select class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbColor" onchange="onChangeSelect(this)" wire:model.defer="pre.color_id">

                        <option value="default">Seleccione una opción</option>

                        @foreach ($colores as $color)

                            <option value="{{ $color->color_id }}">{{ $color->color_nombre }}</option>

                        @endforeach

                    </select>
                    <x-jet-input-error for="pre.color_id"/>

                </div>


            </div>

            <div class="-mx-2 md:flex mb-3">

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">

                <x-jet-label value="Espesor"/>
                
                <select class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbEspesor" onchange="onChangeSelect(this)" wire:model.defer="pre.espesor_id">

                    <option value="default">Seleccione una opción</option>

                    @foreach ($espesores as $espesor)

                        @if ($espesor->espesor_cantidad==0)

                            <option value="{{ $espesor->espesor_id }}">N/A</option> 

                        @else

                            <option value="{{ $espesor->espesor_id }}">{{ $espesor->espesor_cantidad }}</option>
                        
                        @endif
                        

                    @endforeach

                </select>
                    
                <x-jet-input-error for="pre.espesor_id"/>

                </div>

                <div class="md:w-1/2 px-3">

                <x-jet-label value="Resistencia"/>


                <select class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent focus:border-transparentr text-grey-darker  rounded" id="cbResistencia" onchange="onChangeSelect(this)"wire:model.defer="pre.resistencia_id">

                    <option value="default">Seleccione una opción</option>

                    @foreach ($resistencias as $resistencia)

                        @if ($resistencia->resistencia_cantidad==0)
                            <option value="{{ $resistencia->resistencia_id }}">N/A</option>
                        @else
                         <option value="{{ $resistencia->resistencia_id }}">{{ $resistencia->resistencia_cantidad }}</option>
                        @endif
                        

                    @endforeach
                </select>
                <x-jet-input-error for="pre.resistencia_id"/>

                </div>


            </div>

            <div class="-mx-2 md:flex mb-3">

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <x-jet-label value="Dimensión"/>
                <select class="block appearance-none w-full bg-grey-lighter  border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbDimension" onchange="onChangeSelect(this)" wire:model.defer="pre.dimension_id">

                    <option value="default">Seleccione una opción</option>

                    @foreach ($dimensiones as $dimension)

                        <option value="{{ $dimension->dimension_id }}">{{ $dimension->dimension_medida }}</option>

                    @endforeach

                </select>
                    <x-jet-input-error for="pre.dimension_id"/>

                </div>

                <div class="md:w-1/2 px-3">
                <x-jet-label value="Capa"/>


                <select class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker  rounded" id="cbCapa" onchange="onChangeSelect(this)" wire:model.defer="pre.capa_id">

                    <option value="default">Seleccione una opción</option>

                    @foreach ($capas as $capa)

                        <option value="{{ $capa->capa_id }}">{{ $capa->capa_nombre }} </option>

                    @endforeach
                </select>
                <x-jet-input-error for="pre.capa_id"/>

                </div>


            </div>

            <div class="-mx-2 md:flex mb-3">

                <div class="md:w-1/2 px-3">
                    <x-jet-label value="Precio"/>
                    <input class=" appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" type="number" min="1" max="100" placeholder="Precio del producto" wire:model.defer='pre.pre_precio'/>
                    <x-jet-input-error for="pre.pre_precio"/>

                </div>

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <x-jet-label value="Unidad"/>
                    <select class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker rounded" id="cbUnidad" onchange="onChangeSelect(this)" wire:model.defer="pre.unidad_id">

                        <option value="default">Seleccione una opción</option>

                        @foreach ($unidades as $unidad)

                            <option value="{{ $unidad->unidad_id }}">{{ $unidad->unidad_nombre }}</option>

                        @endforeach

                    </select>
                        <x-jet-input-error for="pre.unidad_id"/>

                    </div>



            </div>

            <div class="-mx-2 md:flex mb-3">
              
                <div class="md:w-1/2 px-3">
                    <x-jet-label value="Stock inicial"/>
                        <input class=" appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" type="number" placeholder="Escriba el stock inical del producto" wire:model.defer='pre.pre_stock'/>
                    <x-jet-input-error for="pre.pre_stock"/>
                </div>

            </div>

            <div class="hidden" id="mainData">
                <div  class="-mx-2 md:flex ">
                
                    <div class="md:w-1/4 px-3">
                            <label>{{$descrip}}</label> 
                    </div>

                    {{-- <div class="md:w-1/4 px-3">
                        <x-jet-label value="Descripcion"/>
                </div> --}}

                    <div class="md:w-1/3 ">
                        
                        <input id="txtDescrip" class=" appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" type="text"  wire:model='descrip' />
                            
                        <x-jet-input-error for="descrip"/>

                    </div>

                    <div class="md:w-1/3 ">
                        <x-jet-label value="Codigo"/>

                        <input class=" appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" type="text"  wire:model='codigo'/>
                        
                        <x-jet-input-error for="codigo"/>
                    </div>

                </div>
            </div>


            <x-jet-label value="Observaciones"/>
            <textarea class="py-2 px-3 mb-3 rounded-lg border-2 border-gray-600 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent" type="text" placeholder="Breve descripción de la categoría" rows="4" wire:model.defer='pre.pre_observacion'></textarea>
            <x-jet-input-error for="pre.pre_observacion"/>

            <x-jet-label value="Imagen"/>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-600 rounded-md">
                <div class="flex w-full">
                    <div class="w-full">
                        <center>
                            <x-loading-medium>
                                <x-slot name="targetMethod">
                                    image
                                </x-slot>

                                <x-slot name="message">
                                    Cargando imagen
                                </x-slot>
                               
                            </x-loading-medium>
                            <label wire:loading.remove wire:target='image' class="w-64 flex flex-col items-center  px-4 py-6 hover:bg-gray-200 rounded-lg border-2 border-gray-600 ">
                                <svg class="mx-auto h-12 w-12 text-gray-600" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  </svg>
                                <span class="mt-2 text-base leading-normal text-gray-600">Presione para selecionar una imagen</span>
                                <input  type='file' class="hidden" accept="image/*" wire:model='image' />
                            </label>
                        </center>
                    </div>
                    <div class="w-full" wire:loading.remove wire:target="image">
                        
                        @if (!$image)
                          <ul wire:loading.remove wire:target='image' id="gallery" class="flex flex-1 flex-wrap -m-1">
                            <li id="empty" class="h-full w-full text-center flex flex-col  justify-center items-center">
                              <img class="mx-auto w-32 " src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                              <span class="mt-2 text-base leading-normal text-gray-600">No se ha seleccionado ninguna imagen</span>
                            </li>
                          </ul>
                        @endif
                        <center>
                            @if ($image)
                            <div class="w-full md:w-full mb-4 px-2">
                             <div class="flex flex-col sm:flex-row md:flex-col -mx-2">

                                     <img clas="object-fill " src="{{$image->temporaryUrl()}}"/>
                             </div>
                           </div>
                           @endif
                         </center>
                    </div>
                </div>
            </div>

           
            <x-slot name="eventClick">
                addPrefabricado
            </x-slot>
           

    </x-modal>


    <!--Botón para agregar un nuevo prefabricado-->

    <x-jet-button onclick="document.getElementById('addPreModal').showModal()" id="btn" >

        Agregar Producto

    </x-jet-button>


</div>
