<x-layout>
  
  <div class="max-w-md mx-auto mt-10 bg-white p-5 rounded-md shadow-md">
    @if (session()->has('message'))
    <div class="bg-green-500 text-white p-2 rounded mb-4" role="alert">
      {{ session('message') }}
    </div>
    @endif
    <h1 class="text-2xl mb-5">Redaguoti</h1>
    <form action="/redaguoti" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-4">
          <label class="block text-black-700 font-bold mb-2" for="vardas">
              Vardas
          </label>
          <input
              class="appearance-none border rounded w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:shadow-outline"
              id="vardas" name="vardas" type="text" value="{{$user->vardas}}">
      </div>
      <div class="mb-4">
          <label class="block text-black-700 font-bold mb-2" for="pavarde">
              Pavardė
          </label>
          <input
              class="appearance-none border rounded w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:shadow-outline"
              id="pavarde" name="pavarde" type="text" value="{{$user->pavarde}}">
      </div>
      <div class="mb-4">
          <label class="block text-black-700 font-bold mb-2" for="prisijungimoVardas">
              Prisijungimo Vardas
          </label>
          <input
              class="appearance-none border rounded w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:shadow-outline"
              id="prisijungimoVardas" name="prisijungimoVardas" type="text" value="{{$user->prisijungimoVardas}}">
      </div>
      <div class="mb-4">
        <label class="block text-black-700 font-bold mb-2" for="Epastas">
            Elektroninis paštas
        </label>
        <input
            class="appearance-none border rounded w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:shadow-outline"
            id="Epastas" name="Epastas" type="text" value="{{$user->Epastas}}">
    </div>
      <div class="mb-4">
          <label class="block text-black-700 font-bold mb-2" for="telefonas">
              Telefono numeris
          </label>
          <input
              class="appearance-none border rounded w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:shadow-outline"
              id="telefonas" name="telefonas" type="text" value="{{$user->telefonas}}">
      </div>
      <div class="mb-4">
          <button
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit">
              Išsaugoti
          </button>
      </div>
    </form>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
    onclick="Livewire.emit('openModal', 'change-password')">Pakeisti slaptažodį</button>
  </div>
</x-layout>
