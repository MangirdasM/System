<div class="flex justify-between">
    <h2 class="text-2xl">{{$this->startsAt->format('M Y')}}</h2>
    <div class="flex pb-2">
        <h2 class="text-2xl"><button class="bg-gray-200 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"wire:click="goToPreviousMonth"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
          </svg>
        </button>      
        <h2 class="text-2xl"><button class="bg-gray-200 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l" wire:click="goToNextMonth"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
          </svg></button></h2>  
    </div>     
</div>
