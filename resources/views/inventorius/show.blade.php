<x-layout>
    <div class="mx-auto py-4 flex justify-center">
        <div class="mx-auto lg:w-7/12 gap-4 shadow">
            <div class="flex flex-col rounded shadow px-6 pt-4 text-center sm:text-left divide-y divide-gray-200 border-solid border-2 border-gray-300">
                <h1 class="font-bold bg-gray-200 py-2 px-2 mt-6 border-b-2 border-gray-500">{{ $inv->pavadinimas }}{{'/'}}{{$inv->sventestipas}}</h1>
                <div class="">
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Pavadinimas:   
                        </label>
                        <p class="text-xl" name="date">{{$inv->pavadinimas}}</p>
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="inline-block text-lg" for="date">
                            Kodas:
                        </label>
                        <h3 class="text-lg">{{$inv->kodas}}</h3>
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Įrangos tipas:
                        </label>
                        <h3 class="text-lg">{{$inv->tipas}}</h3>
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Kiekis:
                        </label>
                        <h3 class="text-lg">{{$inv->kiekis}}</h3>
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Nuotrauka:
                        </label>
                        <img src="/storage/{{$inv->nuotrauka}}" alt="" class="object-contain h-48 w-96">
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="date">
                            Papildoma informacija:
                        </label>
                        <h3 class="text-lg">{{$inv->komentarai}}</h3>
                    </div>     
                </div>
                

                
                

                <div class="flex flex-col items-center md:flex-row p-4 gap-2">
                    <a href="{{url()->previous()}}" class="text-blue-400 rounded-xl">
                        <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold h-10 px-5 rounded">
                            Grįžti
                        </button>
                    </a>
                    <a href="{{$inv->id}}/redagavimas" class="text-blue-400 rounded-xl">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-10 px-5 rounded">
                            Redaguoti
                        </button>
                    </a>
                    <form method="POST" action="/inventorius/{{$inv->id}}/">
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

