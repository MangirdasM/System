<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 w-1/3 rounded mb-4 text-base">{{ session('message') }}</div>
    @endif
    <div class="flex flex-row ">
        <div>
            <table class="w-full">
                <thead class="bg-gray-100 border-b-2 border-gray-200">
                    <tr>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Tipas.</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Pavadinimas</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Kiekis</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                </tbody>
                @foreach ($uzsakymas->inventorius as $inv)
                <tr class="bg-white">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        {{ $inv['tipas'] }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        {{ $inv['pavadinimas'] }}
                    </td>
                    {{-- <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        @if(now()->format('Y-m-d') > $uzsakymas->data)
                        
                        <span
                        class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Įvykdytas</span>    
                        @elseif($uzsakymas->darbuotojai->isEmpty() )
                        <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 bold rounded-lg bg-opacity-50 ">Pridėti darbuotojus</span>
                        @else
                        <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider  text-yellow-800 bg-yellow-200 bold rounded-lg bg-opacity-50 ">Paruoštas</span>
                        @endif
                    </td> --}}
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $inv->pivot->kiekis }}</td>
                    <td class="flex gap-x-2 p-3 text-sm text-gray-700 whitespace-nowrap">
    
    
                        <button wire:click="deleteInventorius({{ $inv->pivot->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                    {{-- <div class="flex flex-row items-center gap-2 px-2">
                        {{ $inv->tipas}} {{ $inv->pavadinimas }} {{ $inv->pivot->kiekis }}
                        {{-- <select wire:model='tipas' class="px-1 block rounded text-lg bg-white border border-gray-400 hover:borderw leading-tight focus:outline-none focus:shadow-outline">
                            
                            <option value={{$inv->tipas}}>{{ $inv->pavadinimas }}</option>
                            
                            @foreach ($inventorius as $availableInventorius)
                                <option wire:click="update({{ $availableInventorius['id'] }},{{ $inv->pivot->id }} )">{{ $availableInventorius['pavadinimas'] }}
                                </option> 
                            @endforeach 
                        </select> --}}
                        {{-- <button class="bg-red-500 rounded hover:bg-red-700" wire:click="deleteInventorius({{ $inv->pivot->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                              </svg>  
                        </button>
                    </div> --}}
                @endforeach
        </div>
        

    </div>
</div>
