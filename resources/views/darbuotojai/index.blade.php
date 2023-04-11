<x-layout>
    <div class="p-5 h-screen bg-gray-100">
        <div class="flex flex-col items-center p-4">
            <h1 class="text-xl mb-2 ">Darbuotojai</h1>
            @if (session()->has('message'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('message') }}</div>
            @endif
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
    
            @foreach ($darbuotojai as $darbuotojas)
                <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <div class="flex items-center space-x-2 text-sm">
                        <div>
                            <a href="#" class="text-blue-500 font-bold hover:underline">#{{ $darbuotojas['vardas'] }}</a>
                            <a href="#" class="text-blue-500 font-bold hover:underline">#{{ $darbuotojas['pavarde'] }}</a>
                        </div>
                        <div class="text-gray-500">{{ $darbuotojas['data'] }}</div>
                        <div>
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Delivered</span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-700">
                        {{ $darbuotojas['vieta'] }} {{ '/' }} {{ $darbuotojas['sventestipas'] }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="rounded-lg shadow hidden md:block xl:mx-60">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Prisijungimo Vardas</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Vardas</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Pavarde</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Pareigos</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Elektroninis paštas</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Telefono numeris</th>
                        @if(auth()->user()->pareigos == "administratorius")
                        <th class="w-4 p-3 text-sm font-semibold tracking-wide text-left"></th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
    
                    @foreach ($darbuotojai as $darbuotojas)
                        @if($darbuotojas->filled == 1)
                            <tr class="bg-white">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['prisijungimoVardas'] }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['vardas'] }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['pavarde'] }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['pareigos'] }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['Epastas'] }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['telefonas'] }}</td>
                                @if(auth()->user()->pareigos == "administratorius")
                                <td class="text-sm text-gray-700 whitespace-nowrap">
                                    <button wire:click="deleteUzsakymas({{ $darbuotojas->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </td>
                                @endif
                            </tr>
                        @else
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$darbuotojas['prisijungimoVardas']}}</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap"> Nėra </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap"> Nėra </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap"> {{$darbuotojas['pareigos']}} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap"> Nėra </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap"> Nėra </td>
                            @if(auth()->user()->pareigos == "administratorius")
                            <td class="text-sm text-gray-700 whitespace-nowrap">
                                <button wire:click="deleteDarbuotojas({{ $darbuotojas->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                            @endif
                        </tr>
                        @endif
                    @endforeach
    
                </tbody>
    
            </table>
        </div>
        <div class='p-5 flex flex-col items-center justify-center'>
            <form action="/darbuotojai/sukurti" method="GET">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Sukurti darbuotoją
                </button>
            </form> 
        </div>
    </div>
</x-layout>
