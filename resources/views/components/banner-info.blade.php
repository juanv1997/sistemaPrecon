<div>
    <div class="flex w-full px-6 py-4 my-2 rounded-xl shadow-md font-semibold text-md bg-blue-50 text-blue-800">
        <span class="h-6 w-6 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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