<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.header')
    <form method="POST" action="/inventorius">
        @csrf
        <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="text-2xl font-medium mb-4">New Order</h2>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="pavadinimas">
                                Pavadinimas
                            </label>
                            <input
                                type="text" name="pavadinimas" class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="pavadinimas"  placeholder="Enter the name" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="number">
                                kiekis
                            </label>
                            <input
                                class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="number" name="kiekis" type="text" placeholder="Enter the number" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="type">
                                Tipas
                            </label>
                            <select
                                name="tipas" class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="tipas">
                                <option value="Type A">Garsas</option>
                                <option value="Type B">Šviesos</option>
                                <option value="Type C">Papildoma</option>
                                <!-- More options... -->
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="location">
                                komentarai
                            </label>
                            <input
                                class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="komentarai" name="komentarai" type="text" placeholder="Enter the location" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="nuotrauka">
                                nuotrauka
                            </label>
                            <input
                                class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="text" name="nuotrauka" type="text" />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="other">
                                Kodas
                            </label>
                            <textarea
                                class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="kodas" name="kodas" placeholder="Enter any other details"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Create Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
