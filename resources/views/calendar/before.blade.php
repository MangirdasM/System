<div class="flex">
    <h2 class="text-2xl">{{$this->startsAt->format('M Y')}}</h2>
    <h2 class="text-2xl"><button wire:click="goToPreviousMonth"><</button></h2>
    <h2 class="text-2xl"><button wire:click="goToNextMonth">></button></h2>   
</div>
