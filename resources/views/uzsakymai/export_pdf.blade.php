@include('components.head')
<style>
    *{ font-family: DejaVu Sans !important;line-height:  80%;}
    h4{margin:0%; padding: 0%;}
    table, th, td {
    border: 1px solid;
    }
</style>

<div class="">
    <h1 class="">{{ $uzsakymas['vieta'] }}{{'/'}}{{$uzsakymas['sventestipas']}}</h1>
    <div class="">
        <div class="">
            <h4 class="">
                Data:   
            </h4>
            <p class="" name="date">{{$uzsakymas['data']}}</p>
            <h4 class="">
                Renginio vieta:
            </h4>
            <p class="">{{$uzsakymas['vieta']}}</p>
            <h4 class="">
                Šventės tipas:
            </h4>
            <p class="">{{$uzsakymas['sventestipas']}}</p>
            <h4 class="" >
                Kontaktinio asmens duomenys:
            </h4>
            <p class="">{{$uzsakymas['kontaktinisasmuo']}}, {{$uzsakymas['kontaktinisnumeris']}}</p>
            <h4 class="" >
                Papildoma informacija:
            </h4>
            <p class="">{{$uzsakymas['papildoma']}}</p>


        </div>
        <div>
            <div class="">
                <h4 class="">
                    Darbuotojas/darbuotojai:
                </h4>
                @foreach ($darbuotojai as $darbuotojas)
                <p class="">{{$darbuotojas->vardas}} {{$darbuotojas->pavarde}}, {{$darbuotojas->telefonas}}</p>
                @endforeach
            </div> 
        </div>
        
        <div class="">
            <h4 class="">
                Inventorius:
            </h4>
            <table class="w-full">
                <thead class="bg-gray-200 border-black border-2">
                    <tr>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Tipas</th>
                        <th class="p-3 w-64 text-sm font-semibold tracking-wide text-left">Pavadinimas</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Kiekis</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                </tbody>
                @foreach ($inventorius as $inv)
                <tr class="bg-white">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $inv['tipas'] }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        {{ $inv['pavadinimas'] }}
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $inv->pivot->kiekis }}</td>
                </tr>
                @endforeach
            </table>
        </div>           
    </div> 
</div> 