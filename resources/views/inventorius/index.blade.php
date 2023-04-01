<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.header')
    <div class="p-5 h-screen bg-gray-100">
        <h1 class="text-xl mb-2">Užsakymai</h1>

        <div class=" rounded-lg shadow hidden md:block">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Pavadinimas</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Tipas</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Kiekis</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">

                    @foreach ($inventorius as $inv)
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{ $inv['pavadinimas'] }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{ $inv['tipas'] }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $inv['kiekis'] }}</td>
                        </tr>
                    @endforeach
                    <tr class="bg-gray-50">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <a href="#" class="font-bold text-blue-500 hover:underline">10002</a>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Kring New Fit office chair, mesh + PU,
                            black</td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Shipped</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
            @foreach ($inventorius as $darbuotojas)
                <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <div class="flex items-center space-x-2 text-sm">
                        <div>
                            <a href="#"
                                class="text-blue-500 font-bold hover:underline">#{{ $darbuotojas['id'] }}</a>
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
        <div class='p-5 flex flex-col items-center justify-center'>
            <form action="/inventorius/sukurti" method="GET">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Pridėti įrangą
                </button>
            </form>

          
        </div>
    </div>
</body>

</html>
