<div class="pt-4">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4 text-xl">{{ session('message') }}</div>
    @endif

    <div class="pl-2 bg-gray-50">
        <button type="button" wire:click="$toggle('showDiv')"
            class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-1 px-4 rounded">
            Pridėti inventorių
        </button>
        @if ($showDiv)
            <form>
                <div class="flex gap-2 mt-2">
                    <div class="form-group flex gap-2">
                        <select wire:model='tipas.0'
                            class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
                            <option value="Garso įranga">Garso įranga</option>
                            <option value="Šviesos Įranga">Šviesos įranga</option>
                            <option value="Papildoma">Papildoma</option>
                            <option value="Laidai">Laidai</option>
                            <option value="Kita">Kita</option>
                        </select>
                        <select wire:model='user_id.0'
                            class="px-1 py-1 block rounded text-lg bg-white border border-gray-400 hover:borderw leading-tight focus:outline-none focus:shadow-outline">
                            <option>Pasirinkite inventorių</option>
                            @foreach ($darbuotojai as $darbuotojas)
                                <option value={{ $darbuotojas['id'] }}>{{ $darbuotojas['pavadinimas'] }}</option>
                            @endforeach
                        </select>
                        @error('user_id.0')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <div>
                            <input wire:model='kiekis.0' type="number" name="kiekis"
                                class="text-lg w-12 p-1 border border-gray-400 rounded"
                                placeholder="{{ $likutis }}" id="kiekis" />

                        </div>


                    </div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded"
                        wire:click.prevent="add({{ $i }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                </div>
                {{-- @foreach ($inputs as $key => $value)
                    <div class="flex gap-2 pt-2">
                        <div class="form-group flex gap-4">
                            <select wire:model='tipas.{{$value}}'
                                class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-black-700 leading-tight focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="tipas">
                                <option value="Garso įranga">Garso įranga</option>
                                <option value="Šviesos Įranga">Šviesos įranga</option>
                                <option value="Papildoma">Papildoma</option>
                                <option value="Laidai">Laidai</option>
                                <option value="Kita">Kita</option>
                            </select>
                            <select wire:model='user_id.{{ $value }}'
                                class="px-1 py-1 block rounded text-lg bg-white border border-gray-400 hover:border leading-tight focus:outline-none focus:shadow-outline">
                                <option>Pasirinkite inventorių</option>
                                @foreach ($darbuotojai as $darbuotojas)
                                    <option value={{ $darbuotojas['id'] }}>{{ $darbuotojas['pavadinimas'] }}</option>
                                @endforeach
                            </select>
                            @error('name.' . $value)
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                            <input wire:model='kiekis.{{ $value }}' type="number" name="kiekis"
                                placeholder="{{ $likutis }}" class="text-lg w-12" id="kiekis" />

                        </div>
                        <button class="bg-red-500 rounded hover:bg-red-700"
                            wire:click.prevent="remove({{ $key }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endforeach --}}
                <div class="flex items-center mt-4">
                    <div class="w-full md:w-10/12 text-center">
                        <button type="button" wire:click.prevent="submit()"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold px-4 py-1 rounded">Pridėti</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@livewireScripts
