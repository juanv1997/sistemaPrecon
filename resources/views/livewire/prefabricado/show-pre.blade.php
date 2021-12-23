<div>

    <!--Loading para cualquier proceso-->
    <x-no-target-loading>
        
    </x-no-target-loading>

    <!--Editar-->
    <x-modal>

      <x-slot name="colorIcon">blue-100</x-slot>

      <x-slot name="icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
          </svg>
      </x-slot>

         <x-slot name="action">true</x-slot>

         <x-slot name="cancel">true</x-slot>

        <x-slot name="targetMethodLoading">editPrefabricado</x-slot>

        <x-slot name="loadingMessage">Procesando solicitud...</x-slot>

        <x-slot name="modalId">editPreModal</x-slot>

        <x-slot name="eventClick">editPrefabricado</x-slot>

        <x-slot name="buttonText">Actualizar</x-slot>

        <x-slot name="title">Actualizar prefabricado</x-slot>

      
        <div class="-mx-2 md:flex mb-3">

            <div class="md:w-1/2 px-3">

                <x-jet-label value="Precio"/>  

                <input class=" appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" type="number" placeholder="Nombre de la categoría" wire:model.defer='prefa.pre_precio'/>
                
                <x-jet-input-error for="prefa.pre_precio"/>

            </div>
            

        </div>

        <x-jet-label value="Observaciones"/>

        <textarea name="fr" class="py-2 px-3 mb-3 rounded-lg border-2 border-gray-600 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent" placeholder="Breve descripción de la categoría" rows="4" wire:model.defer='prefa.pre_observacion'></textarea>
        
        <x-jet-input-error for="prefa.pre_observacion"/>
        
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
                          Cargando nueva imagen
                      </x-slot>
                       
                    </x-loading-medium>

                        <label wire:loading.remove wire:target='image' class="w-64 flex flex-col items-center  px-4 py-6 hover:bg-gray-200 rounded-lg border-2 border-gray-600 ">
                            <svg class="mx-auto h-12 w-12 text-gray-600" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                            <span class="mt-2 text-base leading-normal text-gray-600">Presione para selecionar una nueva imagen</span>
                            <input type='file' class="hidden" accept="image/*" wire:model='image' />
                        </label>
                    </center>
                </div>

                <div class="w-full" wire:loading.remove wire:target="image">
                    @if ($prefa )
                      <div class="w-full md:w-full mb-4 px-2">
                        <div class="flex flex-col sm:flex-row md:flex-col -mx-2">
                          <span class="text-center">Imagen actual</span>
                          <img clas="object-fill " src="http://localhost/sistemaPrecon/storage/app/{{$prefa->pre_image_path}}"/>

                        </div>
                      </div>
                    @endif
                    <center>
                        @if ($image)
                        <div class="w-full md:w-full mb-4 px-2">
                         <div class="flex flex-col sm:flex-row md:flex-col -mx-2">

                          <span class="text-center">Imagen seleccionada</span>  
                                 <img clas="object-fill " src="{{$image->temporaryUrl()}}"/>
                         </div>
                       </div>
                       @endif
                     </center>
                </div>
            </div>
        </div>


    </x-modal>

    <!--Visualizar-->

    <x-modal>


      <x-slot name="colorIcon">gray-100</x-slot>

        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
        </x-slot>

        <x-slot name="action">false</x-slot>

        <x-slot name="cancel">false</x-slot>

        <x-slot name="targetMethodLoading">viewPrefabriado</x-slot>

       <x-slot name="loadingMessage">Procesando solicitud...</x-slot>

       <x-slot name="modalId">viewPreModal</x-slot>

       <x-slot name="eventClick"></x-slot>

       <x-slot name="buttonText"></x-slot>

       <x-slot name="title">
            @if ($prefa)

                {{$prefa->pre_descripcion}}

            @endif
        </x-slot>

     <div class="px-2 py-2 sm:px-2">

      </div>
      <div class="border-t border-gray-200">
        <dl>

            <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                  Código
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  @if ($prefa)

                    {{$prefa->pre_codigo}}

                  @endif
                </dd>
             </div>

           

             <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Descripcion
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if ($prefa)
  
                  {{$prefa->pre_descripcion}}
  
                @endif
              </dd>
           </div>
  

          <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Stock
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if ($prefa)

                {{$prefa->pre_stock}}

                @endif
            </dd>
          </div>

          <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Importe
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              @if ($prefa)

                {{$prefa->pre_importe}}

              @endif
            </dd>
          </div>



          <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Observaciones
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              @if ($prefa)

                {{$prefa->pre_observacion}}

              @endif
            </dd>
          </div>

          <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Imagen
            </dt>

                    @if ($prefa)


                    <img clas="object-fill " src="http://localhost/sistemaPrecon/storage/app/{{$prefa->pre_image_path}}"/>

                    @endif

            </dd>
          </div>


        </dl>
      </div>


    </x-modal>

     <!--Eliminar-->

    <x-modal-small>

     
        <x-slot name="colorIcon">red-100</x-slot>

        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
        </x-slot>

      <x-slot name="action">true</x-slot>

      <x-slot name="cancel">true</x-slot>

      <x-slot name="targetMethodLoading">destroyPrefabricado</x-slot>

      <x-slot name="loadingMessage">Procesando solicitud...</x-slot>

      <x-slot name="modalId">destroyPreModal</x-slot>

      <x-slot name="eventClick">destroyPrefabricado</x-slot>

      <x-slot name="buttonText">Eliminar</x-slot>

      <x-slot name="title">Eliminar prefabricado</x-slot>

       ¿Esta seguro de querer borrar el prefabricado @if ($prefa) {{$prefa->pre_descripcion}} @endif ?


    </x-modal-small>

    {{--<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
              <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                <thead class="bg-gray-50" >
                  <tr>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider  text-gray-500 uppercase"
                    >
                      Código
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider  text-gray-500 uppercase"
                    >
                      Nombre
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider  text-gray-500 uppercase"
                    >
                      Categoría
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider  text-gray-500 uppercase"
                    >
                      Proveedor
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider  text-gray-500 uppercase"
                    >
                      Precio
                    </th>
                    <th
                    scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider  text-gray-500 uppercase"
                  >
                    Stock
                  </th>
                  <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider  text-gray-500 uppercase"
                >
                  Acciones
                </th>

                  </tr>
                </thead>
                  <tbody class="bg-white  text-center">
                      @foreach ($prefabricados as $prefabricado)
                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">





                        <td >
                            {{ $prefabricado->pre_codigo }}
                          </td>
                          <td >
                            {{ $prefabricado->tipo_nombre }}
                          </td>
                          <td  >
                            {{ $prefabricado->espesor_cantidad }}
                          </td>
                          <td >
                            {{ $prefabricado->resistencia_cantidad }}
                          </td>
                          <td  >
                            {{ $prefabricado->color_nombre }}
                          </td>
                          <td  >
                            {{ $prefabricado->unidad_termino }}
                          </td>

                          <td  >
                            {{ $prefabricado->pre_precio }}
                          </td>

                          <td >
                            {{ $prefabricado->dimension_medida }}
                          </td>



                          <td>

                              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#show">
                                  <i class="fas fa-list-alt"></i>
                              </button>

                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                                  <i class="fas fa-edit"></i>
                              </button>

                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                  <i class="fas fa-trash"></i>
                              </button>

                          </td>





                    </tr>
                    @endforeach
                  </tbody>
                </table>


    </div> --}}

      @if ($preCount)
          
        <div class='bg-white shadow-md rounded my-2'>
              <table class='min-w-max w-full table-auto'>
                  <thead class="text-center">
                      <tr class='bg-gray-200 text-gray-600  text-sm leading-normal'>

                          <th class='py-3 px-6'>Código</th>
                          <th class='py-3 px-6'>Tipo</th>
                          <th class='py-3 px-6'>Espesor</th>
                          <th class='py-3 px-6'>Resistencia</th>
                          <th class='py-3 px-6'>Color</th>
                          <th class='py-3 px-6'>Unidad</th>
                          <th class='py-3 px-6'>Precio</th>
                          <th class='py-3 px-6'>Dimensión</th>
                          {{-- <th class='py-3 px-6'>Descripción</th> --}}
                          <th class='py-3 px-6'>Stock</th>
                          <th class='py-3 px-6'>Acciones</th>
                      </tr>
                  </thead>
                  <tbody class='text-gray-600 text-sm font-light text-center'>
                      <tr class='border-b border-gray-200 hover:bg-gray-100'>

                          @php
                              $i=1;
                              $hover = "gray-100";
                          @endphp

                          @foreach ($prefabricados as $prefabricado)
                            
                          
                            <tr class="
                                      transition-all hover:bg-{{$hover}} hover:shadow-lg border-b
                                      @if ($prefabricado->pre_stock == 0)
                                        bg-red-100
                                      @endif "
                            >


                                  <td class="py-3 px-6  whitespace-nowrap" >
                                      {{ $prefabricado->pre_codigo }}
                                  </td>
                                  <td class="py-3 px-6 w-0">
                                      {{ $prefabricado->tipo_nombre }}
                                  </td>
                                  <td  class="py-3 px-6  w-0">
                                    @if ($prefabricado->espesor_cantidad==0)
                                        N/A
                                    @else
                                    {{ $prefabricado->espesor_cantidad }}
                                    @endif  
                                    
                                  </td >
                                  <td class="py-3 px-6  w-0">
                                    @if ($prefabricado->resistencia_cantidad==0)
                                        N/A
                                    @else
                                    {{ $prefabricado->resistencia_cantidad }}
                                    @endif  
                                    
                                  </td>
                                  <td class="py-3 px-6  w-0" >
                                      {{ $prefabricado->color_nombre }}
                                  </td>
                                  <td  class="py-3 px-6  w-0">
                                      {{ $prefabricado->unidad_termino }}
                                  </td>

                                  <td  class="py-3 px-6  w-0">
                                      {{ $prefabricado->pre_precio }}
                                  </td>

                                  <td class="py-3 px-6  w-0">
                                      {{ $prefabricado->dimension_medida }}
                                  </td>
                                  {{-- <td class="py-3 px-6 w-4">
                                      {{ $prefabricado->pre_descripcion}}
                                  </td> --}}
                                  <td class="py-3 px-6 w-4">
                                    {{ $prefabricado->pre_stock}}
                                </td>

                                <td class="py-3 px-6 whitespace-nowrap">

                                          <input type="hidden" >

                                          <button  id="view_{{$prefabricado->pre_id}}" onclick="viewPre(this)" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm tracking-widest hover:bg-gray-400 bg-gray-200 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" >

                                              {{-- <div wire:loading class="w-5 h-5 items-center border-4 border-blue-500 rounded-full loader"></div> --}}

                                              {{-- <div  wire:loading class="w-5 h-5">Cargando</div> --}}

                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                              </svg>
                                          </button>


                                          <button  id="edit_{{$prefabricado->pre_id}}"  onclick="editPre(this)"  class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-400 bg-gray-200 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                              </svg>
                                          </button>

                                          <button  id="destroy_{{$prefabricado->pre_id}}"  onclick="destroyPre(this)" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm racking-widest hover:bg-gray-400 bg-gray-200 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                              </svg>
                                          </button>


                                      </td>





                              </tr>


                          @endforeach
                      </tr>
                  </tbody>
              </table>
        </div>

      @endif

    {{$prefabricados->links()}}

</div>
