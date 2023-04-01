<!DOCTYPE html>
<html lang="en">

    <head>
        @include('components.head')
    </head>

    <body>
        <div class="bg-gray-300 flex items-center justify-center h-screen">
            <div class="grid grid-cols-3 gap-4">
                <a href="/uzsakymai" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Užsakymai
                </a>
                <a href="/inventorius" class="bg-blue-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Inventorius
                </a>
                <a href="/darbuotojai" class="bg-blue-400 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Darbuotojai
                </a>
                <a href="/kalendorius" class="bg-blue-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Kalendorius
                </a>
                <a href="/apklausa" class="bg-blue-400 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                    Apklausa
                </a>
                <a href="/nustatymai" class="bg-blue-400 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                    Nustatymai
                </a>
            </div>
        </div>
    </body>

</html>
