<div>

  {{-- <div class="relative">

	<div class="absolute flex border-collapse border-transparent left-0 top-0 h-full w-10">
		<div class="flex items-center justify-center rounded-full rounded-t-full z-10 bg-gray-100 text-gray-600 text-lg h-full w-full">
					
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
			</svg>
		</div>
    </div>
       --}}
    <input type="date"  id="{{$id}}" wire:model.defer="{{$prop}}"   class="rounded-full border bg-white border-gray-800 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-900" value="2018-07-22"
           min="2018-01-01"  >
    
    <div class="flex">
      {{$message}}
    </div>  {{-- </div>   --}}

    {{-- <script>
        $( function() {
          $( "#{{$id}}" ).datepicker();
        } );
    </script> --}}

    
	
</div>