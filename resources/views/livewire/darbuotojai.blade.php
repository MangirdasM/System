<div>
    <label class="block text-gray-700 font-bold mb-2">
        Darbuotojai
    </label>
    <div class="flex flex-row">
        @foreach ($uzsakymas->darbuotojai as $darbuotojas)
            <div class="flex flex-col items-center gap-4 px-2">
                <select>
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option>{{$darbuotojas->Epastas}}</option>
                    @foreach ($darbuotojai as $availableDarbuotojas)
                        <option value={{ $availableDarbuotojas['id'] }}>{{ $availableDarbuotojas['Epastas'] }}</option>
                    @endforeach
                </select>
                <button class="btn btn-blue" wire:click="deleteDarbuotojas({{ $darbuotojas->pivot->id }})">
                    Pašalinti
                </button>
            </div>
        @endforeach
    </div>
</div>
