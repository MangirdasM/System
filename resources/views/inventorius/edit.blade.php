<x-layout>
    <form method="POST" action="/inventorius/{{ $inv->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mx-auto py-4 flex justify-center">
            <div class="mx-auto lg:w-7/12 gap-4 shadow">
                <div
                    class="flex flex-col rounded shadow px-6 pt-4 text-center sm:text-left divide-y divide-gray-200 border-solid border-2 border-gray-300">
                    <h1 class="font-bold bg-gray-200 py-2 px-6 mt-6">
                        {{ $inv->pavadinimas }}{{ '/' }}{{ $inv->kodas }}</h1>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="data">
                            Pavadinimas:
                        </label>
                        <input type="text" name="pavadinimas" class="text-lg" id="pavadinimas"
                            value="{{ $inv->pavadinimas }}" />
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="inline-block text-lg" for="kiekis">
                            Kiekis:
                        </label>
                        <input type="text" name="kiekis" class="text-lg" id="kiekis"
                            value="{{ $inv->kiekis }}" />
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="tipas">
                            Įrangos tipas:
                        </label>
                        <select name="tipas" class="text-lg" id="tipas" value="{{ $inv->tipas }}">
                            <option value="Garso įranga">Garso įranga</option>
                            <option value="Šviesos Įranga">Šviesos įranga</option>
                            <option value="Papildoma">Papildoma</option>
                            <option value="Laidai">Laidai</option>
                            <option value="Kita">Kita</option>
                        </select>
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="kodas">
                            Kodas:
                        </label>
                        <input type="text" name="kodas" class="text-lg" id="kodas"
                            value="{{ $inv->kodas }}" />
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="nuotrauka">
                            Nuotrauka:
                        </label>
                        <input type="file" name="nuotrauka" class="text-lg" id="nuotrauka"
                            value="{{ $inv->nuotrauka }}" />
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="komentarai">
                            Komentarai:
                        </label>
                        <textarea type="text" name="komentarai" class="text-lg w-full" rows=5 id="komentarai">
                                {{ $inv->komentarai }}
                            </textarea>
                    </div>

                    <div class="flex flex-col items-center md:flex-row p-4 gap-2">
                        <a href="/inventorius/{{$inv->id}}" class="text-blue-400 rounded-xl">
                            <button type="button"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold h-10 px-5 rounded">
                                Grįžti
                            </button>
                        </a>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold h-10 px-5 rounded">
                                Atnaujinti
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </form>
</x-layout>
