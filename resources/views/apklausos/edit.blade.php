<x-layout>
    <form method="POST" action="/apklausos/{{ $apklausa->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mx-auto py-4 flex justify-center">
            <div class="mx-auto lg:w-7/12 gap-4 shadow">
                <div class="flex flex-col rounded shadow px-6 pt-4 text-center sm:text-left divide-y divide-gray-200 border-solid border-2 border-gray-300">
                    <h1 class="font-bold bg-gray-200 py-2 px-2 mt-6 border-b-2 border-gray-500">Apklausa {{ $apklausa->uzsakymai->vieta }}{{'/'}}{{$apklausa->uzsakymai->sventestipas}}{{', '}}{{$apklausa->uzsakymai->data}}</h1>
                    <div class="">
                        <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                            <label class="text-3xl inline-block text-lg" for="virsvalandziai">
                                Viršvalandžiai:   
                            </label>
                            <input type="number" name="virsvalandziai" class="text-lg" id="virsvalandziai"/>
                            @error('virsvalandziai')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                        </div>
                        <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                            <label class="inline-block text-lg" for="islaidos">
                                Išlaidos:
                            </label>
                            <input type="number" name="islaidos" class="text-lg" id="islaidos"/>
                            @error('islaidos')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                        </div>
                        <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                            <label class="text-3xl inline-block text-lg" for="kuras">
                                Kuras:
                            </label>
                            <input type="number" name="kuras" class="text-lg" id="kuras"/>
                            @error('kuras')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                        </div>
                        <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                            <label class="text-3xl inline-block text-lg" for="gedimai">
                                Gedimai:
                            </label>
                            <textarea class=" text-lg w-full" name="gedimai" id="gedimai" cols="10" rows="5"></textarea>
                            @error('gedimai')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                        </div>
                        <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                            <label class="text-3xl inline-block text-lg" for="komentarai">
                                Komentarai:
                            </label>
                            <textarea class=" text-lg w-full" name="komentarai" id="komentarai" cols="10" rows="5"></textarea>
                            @error('komentarai')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                        </div>
                        <input name="filled" value=1 hidden/> 
                    </div>
                    

                    
                    

                    <div class="flex flex-col items-center md:flex-row p-4 gap-2">
                        <a href="/apklausos" class="text-blue-400 rounded-xl">
                            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold h-10 px-5 rounded">
                                Grįžti
                            </button>
                        </a>
                        
                    <a href="/apklausos" class="text-blue-400 rounded-xl"> 
                        <button type='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold h-10 px-5 rounded">
                            Išsaugoti
                        </button>
                    </a>
                    
                        
                    </div>
                    </div>
                    
            </div>
        </div>
    </form>
</x-layout>

