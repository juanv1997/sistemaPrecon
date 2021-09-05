<div>
    <div class="flex w-full px-6 py-4 my-2 rounded-xl shadow-md font-semibold text-md bg-green-50 text-green-800">
        <span class="h-6 w-6 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
        </span>
        {{$message}}
        <button wire:click="$set('{{$varForShow}}',false)" class="h-6 w-6 ml-auto">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">    
                </path>
            </svg>
        </button>
    </div>
</div>