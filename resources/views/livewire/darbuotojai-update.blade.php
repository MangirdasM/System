<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 w-1/3 rounded mb-4 text-base">{{ session('message') }}</div>
    @endif
    <div class="flex flex-row">
        <form action="">
            @foreach ($uzsakymas->darbuotojai as $darbuotojas)
                <div class="flex flex-row items-center gap-2 px-2">
                    <select class="px-1 block rounded text-lg bg-white border border-gray-400 hover:borderw leading-tight focus:outline-none focus:shadow-outline">
                        
                        <option >{{ $darbuotojas->Epastas }}</option>
                        @foreach ($darbuotojai as $availableDarbuotojas)
                            <option wire:click="update({{ $availableDarbuotojas['id'] }},{{ $darbuotojas->pivot->id }} )">{{ $availableDarbuotojas['Epastas'] }}
                            </option>
                        @endforeach
                    </select>
                    <button class="bg-red-500 rounded hover:bg-red-700" wire:click="deleteDarbuotojas({{ $darbuotojas->pivot->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>  
                    </button>
                </div>
            @endforeach
        </form>

    </div>
</div>
