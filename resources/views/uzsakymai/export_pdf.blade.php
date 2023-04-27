@include('components.head')
<style>
    *{ font-family: DejaVu Sans !important;}
</style>
<div class="">
    <div class="">
        <h1 class="">{{ $uzsakymas['vieta'] }}{{'/'}}{{$uzsakymas['sventestipas']}}</h1>
        <div class="">
            <div class="">
                <h4 class="">
                    Data:   
                </h4>
                <p class="text-xl" name="date">{{$uzsakymas['data']}}</p>
            </div>
            <div class="">
                <h4 class="inline-block text-lg">
                    Renginio vieta:
                </h4>
                <p class="text-lg">{{$uzsakymas['vieta']}}</p>
            </div>
            <div class="">
                <h4 class="">
                    Šventės tipas:
                </h4>
                <p class="text-lg">{{$uzsakymas['sventestipas']}}</p>
            </div>
            <div class="">
                <h4 class="" >
                    Kontaktinio asmens duomenys:
                </h4>
                <p class="text-lg">{{$uzsakymas['kontaktinisasmuo']}}</p>
            </div>
            <div class="">
                <h4 class="" >
                    Kontaktinio asmens numeris:
                </h4>
                <p class="text-lg">{{$uzsakymas['kontaktinisnumeris']}}</p>
            </div>
            <div class="">
                <h4 class="" >
                    Papildoma informacija:
                </h4>
                <p class="text-lg">{{$uzsakymas['papildoma']}}</p>
            </div>
            <div>
                <div class="">
                    <h4 class="">
                        Darbuotojas/darbuotojai:
                    </h4>
                    {{-- #{{dd($uzsakymas->darbuotojai)}} --}}
                    @foreach ($darbuotojai as $darbuotojas)
                    <p class="text-lg">{{$darbuotojas->vardas}} {{$darbuotojas->pavarde}}, {{$darbuotojas->telefonas}}</p>
                    @endforeach
                </div>
                
            </div>
            

            <div class="">
                <label class=" mb-2">
                    Inventorius:
                </label>
                @foreach ($inventorius as $inv)
                <h3 class="text-lg">{{$inv->tipas}} {{$inv->pavadinimas}}, {{$inv->pivot->kiekis}}</h3>
                @endforeach
            </div>           
        </div>  
    </div>
</div>