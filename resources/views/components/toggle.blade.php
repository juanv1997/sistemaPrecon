<div >
  
  <div  class="relative w-12 transition duration-200 origin-center">

    <input type="checkbox" name="{{$id}}" id="{{$id}}" 
            wire:model.defer="{{$prop}}"  
            class="element-checkbox absolute  w-6 h-6 rounded-full bg-white border-4 "/>
            
    <label for="{{$id}}" class="element-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
        
  </div>

</div>