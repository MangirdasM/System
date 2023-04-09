<x-layout>
    <div class="container">
        <form method="POST" action="/darbuotojai">
            @csrf
            <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
                <div class="w-full max-w-lg">
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-6">
                            <label for="prisijungimoVardas" class="inline-block text-lg mb-2">
                                Prisijungimo vardas
                            </label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="prisijungimoVardas"/>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                            @enderror
                        </div>

                        {{-- <div class="mb-6">
                            <label for="Epastas" class="inline-block text-lg mb-2">Elektronisni</label>
                            <input type="email" class="border border-gray-200 rounded p-2 w-full" name="Epastas" value="{{old('Epastas')}}"/>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                            @enderror
                        </div> --}}

                        <div class="mb-6">
                            <label for="slaptazodis" class="inline-block text-lg mb-2">
                                Slaptažodis
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password2" class="inline-block text-lg mb-2">
                                Patvirtinti slaptažodį
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Sukurti
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>