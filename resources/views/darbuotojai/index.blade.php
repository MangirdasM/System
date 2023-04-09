<x-layout>
    <div class="p-5 h-screen bg-gray-100">
        <div class="flex flex-col items-center p-4">
            <h1 class="text-xl mb-2 ">Darbuotojai</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
    
            @foreach ($darbuotojai as $darbuotojas)
                <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <div class="flex items-center space-x-2 text-sm">
                        <div>
                            <a href="#" class="text-blue-500 font-bold hover:underline">#{{ $darbuotojas['id'] }}</a>
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
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Vardas</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Pavarde</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Pareigos</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Elektroninis paštas</th>
                        <th class="w-8 p-3 text-sm font-semibold tracking-wide text-left">Telefono numeris</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
    
                    @foreach ($darbuotojai as $darbuotojas)
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="/uzsakymai/{{ $darbuotojas->vardas }}"
                                    class="font-bold text-blue-500 hover:underline">{{ $darbuotojas['vardas'] }}</a>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['pavarde'] }}</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['Pareigos'] }}</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['Epastas'] }}</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $darbuotojas['telefonas'] }}</td>
                        </tr>
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
