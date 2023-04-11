<x-layout>
    <form method="POST" action="/uzsakymai/{{ $uzsakymas->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mx-auto py-4 flex justify-center">
            <div class="mx-auto lg:w-7/12 gap-4 shadow">
                <div
                    class="flex flex-col rounded shadow px-6 pt-4 text-center sm:text-left divide-y divide-gray-200 border-solid border-2 border-gray-300">
                    <h1 class="font-bold bg-gray-200 py-2 px-6 mt-6">
                        {{ $uzsakymas->vieta }}{{ '/' }}{{ $uzsakymas->sventestipas }}</h1>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="data">
                            Data:
                        </label>
                        <input type="date" name="data" class="text-lg" id="data"
                            value="{{ $uzsakymas->data }}" />
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="inline-block text-lg" for="vieta">
                            Renginio vieta:
                        </label>
                        <input type="text" name="vieta" class="text-lg" id="vieta"
                            value="{{ $uzsakymas->vieta }}" />
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="sventestipas">
                            Šventės tipas:
                        </label>
                        <select name="sventestipas" class="text-lg" id="sventestipas"
                            value="{{ $uzsakymas->sventestipas }}">
                            <option value="Gimtadienis">Gimtadienis</option>
                            <option value="Vestuvės">Vestuvės</option>
                            <option value="pSvente">Privati šventė</option>
                            <option value="Nuoma">Nuoma</option>
                        </select>
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="kontaktinisasmuo">
                            Kontaktinis asmuo:
                        </label>
                        <input type="text" name="kontaktinisasmuo" class="text-lg" id="kontaktinisasmuo"
                            value="{{ $uzsakymas->kontaktinisasmuo }}" />
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="kontaktinisnumeris">
                            Kontaktinio asmens numeris:
                        </label>
                        <input type="text" name="kontaktinisnumeris" class="text-lg" id="kontaktinisnumeris"
                            value="{{ $uzsakymas->kontaktinisnumeris }}" />
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="papildoma">
                            Papildoma informacija:
                        </label>
                        <textarea type="text" name="papildoma" class="text-lg w-full" rows=5 id="papildoma">
                                {{ $uzsakymas->papildoma }}
                            </textarea>
                    </div>
                    <div>
                        <div class="bg-gray-200 p-2 gap-2">
                            <label class="text-3xl inline-block text-lg" for="date">
                                Darbuotojas/darbuotojai:
                            </label>
                            @if ($uzsakymas->darbuotojai->isEmpty())
                                <h3 class="text-lg text-red-600">Nera prisikirta darbuotoju!</h3>
                            @else
                                <div clas="container">
                                    <livewire:darbuotojai-update :uzsakymas="$uzsakymas" />
                                </div>
                                <div class="flex">
                                    <livewire:darbuotoju-form :uzsakymas_id="$uzsakymas['id']" :uzsakymas_data="$uzsakymas['data']" />
                                </div>
                            @endif
                        </div>

                    </div>


                    <div class="bg-gray-50 p-2 gap-2">
                        <label class="text-3xl inline-block text-lg mb-2" for="date">
                            Inventorius:
                        </label>
                        <h3 class="text-lg text-red-600">Nera priskirta inventoriaus!</h3>
                    </div>






                    <div class="flex flex-col items-center md:flex-row p-4 gap-2">
                        <a href="{{ url()->previous() }}" class="text-blue-400 rounded-xl">
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
