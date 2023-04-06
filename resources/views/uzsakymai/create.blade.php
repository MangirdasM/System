<x-layout>
    <form method="POST" action="/uzsakymai">
        @csrf
        <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h1 class="text-3xl bold font-medium mb-4">Naujas užsakymas</h1>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="name">
                            Kontaktinis asmuo
                        </label>
                        <input
                            type="text" name="kontaktinisasmuo" class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="kontaktinisasmuo"  placeholder="Iveskite kontaktinį asmenį" />
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="number">
                            Telefono numeris
                        </label>
                        <input
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="number" name="kontaktinisnumeris" type="text" placeholder="Iveskite telefono numerį" />
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="type">
                            Šventės tipas
                        </label>
                        <select
                            name="sventestipas" class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="type">
                            <option value="Type A">Gimtadienis</option>
                            <option value="Type B">Vestuvės</option>
                            <option value="Type C">Kita</option>
                            <!-- More options... -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="location">
                            Vieta
                        </label>
                        <input
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="location" name="vieta" type="text" placeholder="Iveskite renginio vietą" />
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="date">
                            Data
                        </label>
                        <input
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="date" name="data" type="date" />
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="other">
                            Papildoma
                        </label>
                        <textarea
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 teblack-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="other" name="papildoma" placeholder="Iveskite papildoma informaciją"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Sukurti užsakymą
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-layout>

