<div>
    
    <div class="px-2">

        <button onclick="showQrModal()" type="submit" class="inline-flex items-center px-1 py-1 bg- border border-transparent rounded-md font-medium text-sm  tracking-widest hover:bg-gray-700 bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
            
            </svg>

        </button>

    </div>

    <x-modal>

        <x-slot name="colorIcon">blue-100</x-slot>

        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
            </svg>
        </x-slot>

        <x-slot name="action">false</x-slot>

        <x-slot name="cancel">false</x-slot>

        <x-slot name="targetMethodLoading"></x-slot>

       <x-slot name="loadingMessage"></x-slot>

       <x-slot name="modalId">createQr</x-slot>

       <x-slot name="headerIcon"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-red-700" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.177l8.631 15.823h-17.262l8.631-15.823zm0-4.177l-12 22h24l-12-22zm-1 9h2v6h-2v-6zm1 9.75c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25z"/></svg></x-slot>

       <x-slot name="eventClick"></x-slot>

       <x-slot name="buttonText"></x-slot>

       <x-slot name="title">


         @switch($queryType)

            @case('material')

                Descargar lista de materiales en formato {{$documentType}}

                @break

            @case('prefabricado')
               
                Descargar lista de prefabricados en formato {{$documentType}}

                @break

        
        @endswitch

       </x-slot>

        <div class="text-center py-1">
            <select wire:model="documentType" class="rounded-full w-1/3 text-center"> 
                <option value="pdf">Documento PDF</option>
                <option value="excel">Documento Excel</option>
            </select> 
        </div>



        
        
        @switch($queryType)

            @case('material')

                <div class="px-44 text-center">

                    <label >Escanee el codigo para descargar la lista de materiales en formato {{$documentType}} </label> 
                       
                </div>

                <div class="py-6 px-44">

                    @if ($documentType == 'excel')

                        {{QrCode::size(300)->color('0','128','255')->generate("http://192.168.100.4/sistemaPrecon/public/api/excelMateriales");}}

                    @else

                        {{QrCode::size(300)->color('0','128','255')->generate("http://192.168.100.4/sistemaPrecon/public/pdfMaterial/download");}}

                    @endif


                </div>

                @break

            @case('prefabricado')
                
                <div class="px-44 text-center">

                    <label class="text-center">Escanee el codigo para descargar la lista de prefabricados en formato {{$documentType}}</label>

                </div>

                <div class="py-6 px-44">

                    @if ($documentType == 'excel')

                        {{QrCode::size(300)->color('0','128','255')->generate("http://192.168.100.4/sistemaPrecon/public/api/excelPrefabricados");}}

                    @else

                        {{QrCode::size(300)->color('0','128','255')->generate("http://192.168.100.4/sistemaPrecon/public/pdfPre/download");}}
                    
                    @endif

                    

                </div>

                @break   

        @endswitch


        <x-loading>

            <x-slot name="targetMethod">
    
                documentType
    
            </x-slot>
    
        </x-loading>
        


    </x-modal>

    

</div>
