<!DOCTYPE html>
<html lang="en">
	<head>
		@include('components.head')
	</head>
	<body>
		@include('components.header')
        <div class="container">
            <form method="POST" action="/darbuotojai">
                @csrf
                <div class="mb-6">
                    <label for="prisijungimoVardas" class="inline-block text-lg mb-2">
                        prisijungimoVardas
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="prisijungimoVardas" value="{{old('prisijungimoVardas')}}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="Epastas" class="inline-block text-lg mb-2">Epastas</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="Epastas" value="{{old('Epastas')}}"/>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="slaptazodis" class="inline-block text-lg mb-2">
                        slaptazodis
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">
                        Confirm Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                    @enderror
                </div>
    
                <div class="mb-6">
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Sign Up
                    </button>
                </div>
    
                <div class="mt-8">
                    <p>
                        Already have an account?
                        <a href="/login" class="text-laravel">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </body>
</html>