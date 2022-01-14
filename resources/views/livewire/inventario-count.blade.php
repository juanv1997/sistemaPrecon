<div>
    
    @if ($stockProducto != 0) 

            <div wire:loading.remove  class=" flex space-x-7 text-center" >


                <div class="py-1 px-3 relative">
                        
                    <label class="text-center absolute  text-gray-800 font-bold w-4 h-4 text-lg leading-5 right-1 top-3 ">
                        
                        {{$stringResult}}

                    </label>
                    
                                        
                </div>

            </div>
{{-- 
            <div wire:loading >

                <div class="w-10 h-10 items-center border-4 border-blue-500 rounded-full loader"></div>
                
            </div>   --}}
            
            <div wire:loading >

                <div class="w-10 h-10 items-center border-4 border-blue-500 rounded-full loader"></div>
                
            </div>
    
    @endif 


    

    
                       
</div>
