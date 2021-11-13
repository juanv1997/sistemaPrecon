<div>
    
    @if ($stockProducto != 0) 
        
        <div wire:loading.remove class="flex space-x-7 justify-end " >

            <div class="py-1 relative">
                     
                    <div class="text-center absolute  text-gray-800 font-bold w-6 h-6 text-lg leading-5 rounded-full -right-2 top-5 "> {{$stockProducto}} </div>
                                    
            </div>

        

        </div> 

        <div wire:loading >
            <div class="w-10 h-10 items-center border-4 border-blue-500 rounded-full loader"></div>
        </div> 

    @endif 

    
                       
</div>
