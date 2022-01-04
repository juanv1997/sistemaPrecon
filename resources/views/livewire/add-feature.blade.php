<div>

     <x-jet-button wire:click="$emit('addFeature')">
        Agregar característica
     </x-jet-button> 

    <x-modal-small>

        <x-slot name="colorIcon">green-100</x-slot>

        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
        </x-slot>

        <x-slot name="action">true</x-slot>
  
        <x-slot name="cancel">true</x-slot>

        <x-slot name="headerIcon"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-red-700" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.177l8.631 15.823h-17.262l8.631-15.823zm0-4.177l-12 22h24l-12-22zm-1 9h2v6h-2v-6zm1 9.75c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25z"/></svg></x-slot>
  
        <x-slot name="targetMethodLoading">addFeature</x-slot>
  
        <x-slot name="loadingMessage">Procesando solicitud...</x-slot>
  
        <x-slot name="modalId">addfeatureModal</x-slot>
  
        <x-slot name="eventClick">addFeature</x-slot>
  
        <x-slot name="buttonText">Agregar</x-slot>
  
        <x-slot name="title">Agregar característica</x-slot>
  
        <div class="-mx-2 md:flex ">

            <div class="md:w-1/2 px-2 ">

                <x-jet-label value="Característica"/> 
                
                <select class="block appearance-none w-full bg-grey-lighter border-gray-600 focus:ring-gray-700 focus:border-transparent text-grey-darker rounded" id="grid-state" wire:model.defer="feature">

                    <option >Seleccione una</option>

                    <option >Tipo</option>

                    <option >Unidad</option>

                    @if ($tipoProducto=='pre') 
                        <option >Resistencia</option>
                        <option >Espesor</option>
                        <option >Color</option>
                        <option >Dimensión</option>
                    @endif

                </select>

                <x-jet-input-error for="feature"/>

            </div>

            <div class="md:w-1/2 px-2">
                <x-jet-label value="Valor"/>  
                <input class=" appearance-none block w-full rounded-lg border-2 border-gray-600  focus:outline-none focus:ring-2 focus:ring-gray-700 focus:border-transparent" type="text" placeholder="Nombre de la categoría" wire:model.defer="featureValue"/>
                <x-jet-input-error for="featureValue"/>
            </div>



        </div>
  
  
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

        <x-slot name="headerIcon"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-red-700" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.177l8.631 15.823h-17.262l8.631-15.823zm0-4.177l-12 22h24l-12-22zm-1 9h2v6h-2v-6zm1 9.75c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25z"/></svg></x-slot>
  
        <x-slot name="targetMethodLoading">addFeature</x-slot>
  
        <x-slot name="loadingMessage">Procesando solicitud...</x-slot>
  
        <x-slot name="modalId">sameFeature</x-slot>
  
        <x-slot name="eventClick"></x-slot>
  
        <x-slot name="buttonText"></x-slot>
  
        <x-slot name="title">Caracteristica duplicada</x-slot>
  
        Lo sentimos, la caracteristica que desea agregar ya se encuentra registrada, por favor ingresa otra      
  
  
    </x-modal-small>
</div>
