<div>
    <label class="block text-gray-700 font-bold mb-2">
        Darbuotojai
    </label>
    <div class="flex flex-row">
        <form action="">
            @foreach ($uzsakymas->darbuotojai as $darbuotojas)
                <div class="flex flex-col items-center gap-4 px-2">
                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:borderw leading-tight focus:outline-none focus:shadow-outline">
                        
                        <option >{{ $darbuotojas->Epastas }}</option>
                        @foreach ($darbuotojai as $availableDarbuotojas)
                            <option wire:click="update({{ $availableDarbuotojas['id'] }},{{ $darbuotojas->pivot->id }} )">{{ $availableDarbuotojas['Epastas'] }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-blue" wire:click="deleteDarbuotojas({{ $darbuotojas->pivot->id }})">
                        Pašalinti
                    </button>
                </div>
            @endforeach
        </form>

    </div>
</div>
