<div class="p-5 h-screen bg-gray-100">
    <div class="flex flex-col items-center p-4">
        <h1 class="text-xl mb-2 ">Inventorius</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">

        @foreach ($inventorius as $inv)
            <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                <div class="flex items-center space-x-2 text-sm">
                    <div>
                        <a href="/inventorius/{{ $inv->id }}" class="text-blue-500 font-bold hover:underline">#{{ $inv->kodas }}</a>
                    </div>
                    <div class="text-gray-500">{{ $inv['pavadinimas'] }}</div>
                    <div>
                        @if(now()->format('Y-m-d') > $inv->data)
                        
                        <span
                        class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Įvykdytas</span>    
                        @elseif($inv->darbuotojai->isEmpty() )
                        <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 bold rounded-lg bg-opacity-50 ">Pridėti darbuotojus</span>
                        @else
                        <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider  text-yellow-800 bg-yellow-200 bold rounded-lg bg-opacity-50 ">Paruoštas</span>
                        @endif
                    </div>
                </div>
                <div class="text-sm text-gray-700">
                    {{ $inv['pavadinimas'] }} {{ '/' }} {{ $inv['sventestipas'] }}
                </div>
            </div>
        @endforeach
    </div>
    <div class="rounded-lg shadow hidden md:block xl:mx-60">
        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th class="w-10 p-3 text-sm font-semibold tracking-wide text-left">Kodas</th>
                    <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Tipas</th>
                    <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Pavadinimas</th>
                    <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Kiekis</th>
                    <th class="w-12 p-3 text-sm font-semibold tracking-wide text-left"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">

                @foreach ($inventorius as $inv)
                    <tr class="bg-white">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <a href="/inventorius/{{ $inv->id }}"
                                class="font-bold text-blue-500 hover:underline">#{{ $inv['id'] }}</a>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            {{ $inv['tipas'] }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">

                            <span
                            class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$inv['pavadinimas']}}</span>    
                            
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $inv['data'] }}</td>
                        <td class="flex gap-x-2 p-3 text-sm text-gray-700 whitespace-nowrap">


                            <button wire:click="deleteInventorius({{ $inv->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>

                        </td>
                    </tr>
                @endforeach

                {{-- <tr class="bg-gray-50">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        <a href="#" class="font-bold text-blue-500 hover:underline">10002</a>
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Kring New Fit office chair, mesh + PU,
                        black</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        <span
                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Shipped</span>
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/10/2021</td>
                </tr> --}}

            </tbody>

        </table>




    </div>

    <div class='p-5 flex flex-col items-center justify-center'>
        <form action="/inventorius/sukurti" method="GET">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Pridėti inventorių
            </button>
        </form>
        <div class="pt-4">
            {{ $inventorius->links('pagination::tailwind') }}
        </div>
        
    </div>

</div>


@livewireScripts
