<div >
    
        <div  class="relative w-12 transition duration-200 origin-center">
            <input type="checkbox" name="{{$id}}" id="{{$id}}" 
            {{-- wire:ignore.self --}}
             wire:model.defer="{{$prop}}"  
            class="{{$id}}-checkbox absolute  w-6 h-6 rounded-full bg-white border-4 "/>
            <label for="{{$id}}" class="{{$id}}-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
        </div>
    
    <style>
    
        .{{$id}}-checkbox:checked {
            box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.2); 
          @apply: right-0 border-green-400;
          right: 0;
          border-color: #68D391;
        }
        .{{$id}}-checkbox:checked + .{{$id}}-label {
            box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.2);
            @apply: bg-green-400;
          background-color: #68D391;
        }
        </style>
</div>