<div>

    <dialog wire:ignore.self id='{{$modalId}}' class="h-auto w-11/12 md:w-1/2 bg-white rounded-md ">


        <div class="flex flex-col w-full h-auto ">

            <div class="flex w-full h-auto justify-center items-center">

            
                 <div class="bg-{{$colorIcon}} p-3 md:self-start rounded-full">
                   {{$icon}}
                </div> 

                <div class="flex w-10/12 h-auto py-3 justify-center text-center items-center text-2xl font-bold">
                      {{$title}}
                </div>

                <div onclick="document.getElementById('{{$modalId}}').close();" class="flex w-1/12 h-auto justify-center cursor-pointer hover:bg-red-50 p-3 md:self-start rounded-full">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </div>

            </div>

                {{$slot}}

        </div>

        <div class='flex items-center justify-center md:gap-2 p-4'>



            <div x-data="{ openAction: {{$action}} }">

                    <x-jet-button wire:click='{{$eventClick}}' x-show="openAction">


                    {{$buttonText}}

                    </x-jet-button>
            </div>

            <div x-data="{ openCancel: {{$cancel}} }">
                <x-jet-danger-button onclick="document.getElementById('{{$modalId}}').close();" x-show="openCancel">

                    Cancelar

                </x-jet-danger-button>
            </div>
            
        </div>

        <x-loading >

            <x-slot name="targetMethod">
                {{$targetMethodLoading}}
            </x-slot>
    
            <x-slot name="message">
                {{$loadingMessage}}
            </x-slot>
    
        </x-loading> 
       
    </dialog>

</div>