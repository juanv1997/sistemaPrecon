<div>
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">


        <select  id="cbPro" class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker rounded"  wire:model.defer="producto" onchange="getStockPro()">

            {{-- @if(true)

                <option value="default">Seleccione una opcion</option>

            @endif --}}

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
        {{-- <x-jet-input-error for="producto"/> --}}

    </div>
</div>
