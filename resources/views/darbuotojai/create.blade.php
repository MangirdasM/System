<x-layout>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('message') }}</div>
    @endif
    <div class="container">
        <form method="POST" action="/darbuotojai">
            @csrf
            <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
                
                <div class="w-full max-w-lg">
                    
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <h1 class='flex justify-center mb-4'>Naujas darbuotojas</h1>
                        <div class="mb-6">
                            <label for="prisijungimoVardas" class="inline-block text-lg mb-2">
                                Prisijungimo vardas
                            </label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="prisijungimoVardas"/>
                            @error('prisijungimoVardas')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="inline-block text-lg mb-2" for="pareigos">
                                Pareigos
                            </label>
                            <select
                                name="pareigos" class="shadow-sm border-gray-300 rounded-md w-full py-1 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="pareigos">
                                <option value="darbuotojas">Darbuotojas</option>
                                <option value="administratorius">Administratorius</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="inline-block text-lg mb-2">
                                Slaptažodis
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                            @error('password')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password_confirmation" class="inline-block text-lg mb-2">
                                Patvirtinti slaptažodį
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                            @error('password_confirmation')
                                <p class="text-red-500 text-base mt-1">{{$message}}</p>   
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