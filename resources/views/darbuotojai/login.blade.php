<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>

    <form method="POST" action="/users/authenticate">
        @csrf

        <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="text-2xl font-medium mb-4 text-center">Prisijungimas</h2>
                    <form>
                        <div class="mb-4">
                            <label for="prisijungimoVardas" class="inline-block text-lg mb-2">Prisijungimo vardas</label>
                            <input type="text" class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" name="prisijungimoVardas" id='prisijungimoVardas' value="{{old('prisijungimoVardas')}}"/>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 font-bold mb-2">
                                Slaptažodis
                            </label>
                            <input type="password" class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500" name="password" />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                            @enderror
                        </div>
                        <div class="flex items-center justify-between mx-32">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Prisijungti
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>
