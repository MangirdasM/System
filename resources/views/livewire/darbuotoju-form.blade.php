<div class="pt-4">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4 text-xl">{{ session('message') }}</div>
    @endif

    <div class="container pl-2 bg-gray-200">
        <button type="button" wire:click="$toggle('showDiv')"
            class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-1 px-4 rounded">
            Pridėti darbuotojus
        </button>
        @if ($showDiv)
            <form>
                <div class="flex gap-2 mt-4">
                    <div class="form-group">
                        <select wire:model='user_id.0'
                            class="px-1 py-1 block rounded text-lg bg-white border border-gray-400 hover:borderw leading-tight focus:outline-none focus:shadow-outline">
                            <option>Pasirinkite darbuotoją</option>
                            @foreach ($darbuotojai as $darbuotojas)
                                <option value={{ $darbuotojas['id'] }}>{{ $darbuotojas['vardas'].' '.$darbuotojas['pavarde']}}</option>
                            @endforeach
                        </select>
                        @error('user_id.0')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded"
                        wire:click.prevent="add({{ $i }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
                @foreach ($inputs as $key => $value)
                    <div class="flex gap-2 pt-2">
                        <div class="form-group">
                            <select wire:model='user_id.{{ $value }}'
                                class="px-1 py-1 block rounded text-lg bg-white border border-gray-400 hover:borderw leading-tight focus:outline-none focus:shadow-outline">
                                <option>Pasirinkite darbuotoja</option>
                                @foreach ($darbuotojai as $darbuotojas)
                                    <option value={{ $darbuotojas['id'] }}>{{ $darbuotojas['vardas'].' '.$darbuotojas['pavarde']}}</option>
                                @endforeach
                            </select>
                            @error('name.' . $value)
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="bg-red-500 rounded hover:bg-red-700"
                            wire:click.prevent="remove({{ $key }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endforeach
                <div class="flex items-center mt-4">
                    <div class="w-full md:w-10/12 text-center">
                        <button type="button" wire:click.prevent="submit()"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold px-4 py-1 rounded">Išsaugoti</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@livewireScripts
