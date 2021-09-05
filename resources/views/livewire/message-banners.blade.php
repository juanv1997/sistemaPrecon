<div>
    @if ($addedBanner)   
    <x-banner-success>
        <x-slot name="varForShow">
            addedBanner
        </x-slot>

        <x-slot name="message">
            Producto agregado con éxito
        </x-slot>
            
    </x-banner-success>
@endif

@if ($destroyedBanner)
      <x-banner-destroy>

            <x-slot name="varForShow">
            destroyedBanner
            </x-slot>

            <x-slot name="message">
            Producto eliminado con éxito
            </x-slot>
         
      </x-banner-destroy>
@endif

@if ($editedBanner)
    <x-banner-info>

        <x-slot name="varForShow">
            editedBanner
        </x-slot>

        <x-slot name="message">
            Producto actualizado con éxito
        </x-slot>
    
    </x-banner-info>
@endif

</div>
