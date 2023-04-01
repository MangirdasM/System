<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.header')

    <div class="mx-auto max-w-4xl">



        <div class="flex justify-center items-start h-screen">
            <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-8 p-4 ">
                @foreach ($darbuotojai as $darbuotojas)
                    <div class="flex flex-wrap justify-center">
                        <div class="bg-white rounded-lg shadow-lg m-4 overflow-hidden">
                            <div class="px-4 py-2 bg-gray-100">
                                <h2 class="text-lg font-semibold text-gray-800">
                                    {{ $darbuotojas['vardas'], $darbuotojas['pavarde'] }}</h2>
                                <p class="text-sm text-gray-600">{{ $darbuotojas['Epastas'] }}</p>
                            </div>
                            <div class="px-4 py-2">
                                <p class="text-gray-700">Joined: 01/01/2022</p>
                                <p class="text-gray-700">Last login: 03/23/2023</p>
                            </div>
                            <div class="px-4 py-2 bg-gray-100">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Edit
                                    Profile</button>
                                <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Delete
                                    Account</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </div>
    <div class='p-5 flex flex-col items-center justify-center'>
        <form action="/darbuotojai/sukurti" method="GET">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Pridėti užsakymą
            </button>
        </form>


    </div>

    </div>


</body>

</html>
