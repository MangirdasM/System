<x-layout>
    <form method="POST" action="/inventorius" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h1 class="text-3xl bold font-medium mb-4">Naujas inventorius</h1>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="pavadinimas">
                            Pavadinimas
                        </label>
                        <input
                            type="text" name="pavadinimas" class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="pavadinimas"  placeholder="Iveskite pavadinimą" />
                        @error('Pavadinimas')
                            <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="kodas">
                            Kodas
                        </label>
                        <input
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="kodas" name="kodas" type="text" placeholder="Iveskite inventoriaus kodą" />
                            @error('kodas')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="tipas">
                            Inventoriaus tipas
                        </label>
                        <select
                            name="tipas" class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="tipas">
                            <option value="Garso įranga">Garso įranga</option>
                            <option value="Šviesos Įranga">Šviesos įranga</option>
                            <option value="Papildoma">Papildoma</option>
                            <option value="Laidai">Laidai</option>
                            <option value="Kita">Kita</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="kiekis">
                            Kiekis
                        </label>
                        <input
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="kiekis" name="kiekis" type="number" placeholder="Iveskite kiekį" />
                            @error('kiekis')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                    </div>
                    
                    <div class="mb-4">
                        @csrf
                        <label class="inline-block text-lg mb-2" for="nuotrauka">
                            Nuotrauka
                        </label>
                        <input type="file" class="form-control" name="nuotrauka" />
                        @error('nuotrauka')
                        <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="inline-block text-lg mb-2" for="komentarai">
                            Komentarai
                        </label>
                        <textarea
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 teblack-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            id="komentarai" name="komentarai" placeholder="Iveskite papildoma informaciją"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Sukurti inventorių
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>

