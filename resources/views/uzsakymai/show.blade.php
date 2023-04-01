<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    @livewireStyles
</head>

<body class="bg-gray-100">
    @include('components.header')
    <div class="container mx-auto py-8">
        <!-- Display Listing Title -->
        <h1 class="text-2xl font-bold mb-4">{{ $uzsakymas->vieta }}{{'/'}}{{$uzsakymas->sventestipas}}</h1>
        <div class="grid grid-cols-2 gap-4">
            <!-- Display uzsakymas Details -->
            <div class="flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl mb-2">{{$uzsakymas->data}}</h3>
                    <h3 class="text-2xl mb-2">{{$uzsakymas->vieta}}</h3>
                    <h3 class="text-2xl mb-2">{{$uzsakymas->sventestipas}}</h3>
                    <h3 class="text-2xl mb-2">{{$uzsakymas->kontaktinisasmuo}}{{','}}{{{$uzsakymas->kontaktinisnumeris}}}</h3>
                    <div class="flex gap-4">
                        @if ($uzsakymas->darbuotojai->isEmpty())
                        <h3 class="text-2xl mb-2">Nera prisikirta darbuotoju.</h3>

                        @else
                        @foreach ($uzsakymas->darbuotojai as $darbuotojas)
                        <h3 class="text-2xl mb-2">{{$darbuotojas->Epastas}}</h3>
                        @endforeach
                        @endif

                    </div>
                    
                    

                </div>
                <livewire:darbuotoju-form :uzsakymas_id="$uzsakymas['id']" :uzsakymas_data="$uzsakymas['data']"/>


                <a href="{{$uzsakymas->id}}/redagavimas" class="text-blue-400 px-6 py-2 rounded-xl"><i
                    class="fa-solid fa-pen-to-square"></i>
                Edit</a>
            </div>
        </div>
    </div>
</body>

</html>
