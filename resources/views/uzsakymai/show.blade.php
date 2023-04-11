<x-layout>
    <div class="mx-auto py-4 flex justify-center">
        <div class="mx-auto lg:w-7/12 gap-4 shadow">
            <div class="flex flex-col rounded shadow px-6 pt-4 text-center sm:text-left divide-y divide-gray-200 border-solid border-2 border-gray-300">
                <h1 class="font-bold bg-gray-200 py-2 px-2 mt-6 border-b-2 border-gray-500">{{ $uzsakymas->vieta }}{{'/'}}{{$uzsakymas->sventestipas}}</h1>
                <div class="">
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Data:   
                        </label>
                        <p class="text-xl" name="date">{{$uzsakymas->data}}</p>
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="inline-block text-lg" for="date">
                            Renginio vieta:
                        </label>
                        <h3 class="text-lg">{{$uzsakymas->vieta}}</h3>
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Šventės tipas:
                        </label>
                        <h3 class="text-lg">{{$uzsakymas->sventestipas}}</h3>
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Kontaktinio asmens duomenys:
                        </label>
                        <h3 class="text-lg">{{$uzsakymas->kontaktinisasmuo}}</h3>
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Kontaktinio asmens numeris:
                        </label>
                        <h3 class="text-lg">{{$uzsakymas->kontaktinisnumeris}}</h3>
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Papildoma informacija:
                        </label>
                        <h3 class="text-lg">{{$uzsakymas->papildoma}}</h3>
                    </div>
                    <div>
                        <div class="bg-gray-200 p-2 gap-2">
                            <label class="text-3xl inline-block text-lg" for="date">
                                Darbuotojas/darbuotojai:
                            </label>
                            @if ($uzsakymas->darbuotojai->isEmpty())
                            <h3 class="text-lg text-red-600">Nera prisikirta darbuotoju!</h3>
                            <div class="flex">
                                <livewire:darbuotoju-form :uzsakymas_id="$uzsakymas['id']" :uzsakymas_data="$uzsakymas['data']"/>
                            </div>
                            @else
                            @foreach ($uzsakymas->darbuotojai as $darbuotojas)
                            <h3 class="text-lg">{{$darbuotojas->vardas}} {{$darbuotojas->pavarde}}, {{$darbuotojas->telefonas}}</h3>
                            @endforeach
                            @endif  
                        </div>
                        
                    </div>
                    

                    <div class="bg-gray-50">
                        <label class="text-3xl inline-block text-lg mb-2" for="date">
                            Inventorius:
                        </label>
                        <h3 class="text-lg text-red-600">Nera priskirta inventoriaus!</h3>
                    </div>
                    
                </div>
                

                
                

                <div class="flex flex-col items-center md:flex-row p-4 gap-2">
                    <a href="{{url()->previous()}}" class="text-blue-400 rounded-xl">
                        <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold h-10 px-5 rounded">
                            Grįžti
                        </button>
                    </a>
                    <a href="{{$uzsakymas->id}}/redagavimas" class="text-blue-400 rounded-xl">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-10 px-5 rounded">
                            Redaguoti
                        </button>
                    </a>
                    <a href="{{$uzsakymas->id}}/redagavimas" class="text-blue-400 rounded-xl">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-10 px-5 rounded">
                            Išsaugoti
                        </button>
                    </a>
                    <form method="POST" action="/uzsakymai/{{$uzsakymas->id}}/">
                        @csrf
                        @method("DELETE")
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold h-10 px-5 rounded">
                            Pašalinti
                        </button>
                    </form>
                    
                </div>
                </div>
                
        </div>
    </div>
</x-layout>

