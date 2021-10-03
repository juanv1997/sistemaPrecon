<div>
    
    @if ($stockProducto != 0) 
        
        <div class="flex space-x-7 justify-end " wire:loading.remove wire:target="itemChanged" >

            <div class="py-1 relative">
                    
                        
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    
                    </svg>
                    
                    <div class="text-center absolute  text-gray-800 font-bold w-6 h-6 text-lg leading-5 rounded-full -right-2 top-5 "> {{$stockProducto}} </div>
                                    
            </div>

        

        </div> 

     @endif 
                       
</div>
