<x-layout>
    <div class="flex h-screen mx-auto">
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-3/5 px-8 pt-6 pb-8 mb-4">

            <h2 class="text-2xl font-medium mb-4">
            </h2>

            <div class="">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="vardas">
                        Vardas
                    </label>
                    <input type="text" name="vardas" class="input-style" id="vardas"
                        placeholder="Enter the name" value="{{$darbuotojas->vardas}}" />
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="pavarde">
                        Pavardė
                    </label>
                    <input type="text" name="pavarde" class="input-style" id="pavarde"
                         value="" />
                </div>
                <label class="block text-gray-700 font-bold mb-2" for="number">
                    Prisijungimo vardas
                </label>
                <input type="text" name="prisijungimovardas" class="input-style" id="prisijungimovardas"
                     value="" />
                <div>
                    
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="epastas">
                        Elektroninis paštas
                    </label>
                    <input type="text" name="epastas" class="input-style" id="epastas"
                        placeholder="Enter the location" value="" />
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="telefonas">
                        Telefonas
                    </label>
                    <input type="number" name="telefonas" class="input-style" id="telefonas"
                        value="" />
                </div>
                
            </div>

            <div class="flex justify-end">
                <button type="submit" class="button-style">
                    Atnaujinti
                </button>
            </div>
</x-layout>