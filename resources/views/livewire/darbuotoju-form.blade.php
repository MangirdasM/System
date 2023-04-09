<div class="bg-gray-100 p-4">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="container pb-4 bg-gray-100">
        <button type="button" wire:click="$toggle('showDiv')" class="bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold py-2 px-4 rounded">
            Pridėti darbuotojus
        </button>
        @if ($showDiv)
            <form>
                <div class="flex gap-4 mt-4">
                    <div class="form-group">
                        <select wire:model='user_id.0'
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option>Pasirinkite darbuotoja</option>
                            @foreach ($darbuotojai as $darbuotojas)
                                <option value={{ $darbuotojas['id'] }}>{{ $darbuotojas['Epastas'] }}</option>
                            @endforeach
                        </select>
                        @error('user_id.0')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded"
                        wire:click.prevent="add({{ $i }})">Pridėti</button>
                </div>
                @foreach ($inputs as $key => $value)
                    <div class="flex gap-4 pt-2">
                        <div class="form-group">
                            <select wire:model='user_id.{{ $value }}'
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option>Pasirinkite darbuotoja</option>
                                @foreach ($darbuotojai as $darbuotojas)
                                    <option value={{ $darbuotojas['id'] }}>{{ $darbuotojas['Epastas'] }}</option>
                                @endforeach
                            </select>
                            @error('name.' . $value)
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                            wire:click.prevent="remove({{ $key }})">Ištrinti</button>
                    </div>
                @endforeach
                <div class="flex items-center mt-4">
                    <div class="w-full md:w-1/12"></div>
                    <div class="w-full md:w-10/12 text-center">
                        <button type="button" wire:click.prevent="submit()"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Išsaugoti</button>
                    </div>
                    <div class="w-full md:w-1/12"></div>
                </div>
            </form>
        @endif
    </div>


</div>


@livewireScripts
