<x-layout>
    <form method="POST" action="/uzsakymai/{{ $uzsakymas->id }} enctype="multipart/form-data"">
        @csrf
        @method('PUT')
        <div class="flex h-screen mx-auto">
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-3/5 px-8 pt-6 pb-8 mb-4">

                <h2 class="text-2xl font-medium mb-4">{{ $uzsakymas->vieta . ' / ' . $uzsakymas->sventestipas }}
                </h2>

                <div class="">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="name">
                            Kontaktinis asmuo
                        </label>
                        <input type="text" name="kontaktinisasmuo" class="input-style" id="kontaktinisasmuo"
                            placeholder="Enter the name" value="{{ $uzsakymas->kontaktinisasmuo }}" />
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="number">
                            Telefono numeris
                        </label>
                        <input type="text" name="kontaktinisnumeris" class="input-style" id="number"
                            placeholder="Enter the number" value="{{ $uzsakymas->kontaktinisnumeris }}" />
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="type">
                            Šventės tipas
                        </label>
                        <select name="sventestipas" class="input-style" id="type"
                            value="{{ $uzsakymas->sventestipas }}">
                            <option value="Type A">Gimtadienis</option>
                            <option value="Type B">Vestuvės</option>
                            <option value="Type C">Kita</option>
                            <!-- More options... -->
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="location">
                            Vieta
                        </label>
                        <input type="text" name="vieta" class="input-style" id="location"
                            placeholder="Enter the location" value="{{ $uzsakymas->vieta }}" />
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="date">
                            Data
                        </label>
                        <input type="date" name="data" class="input-style" id="date"
                            value="{{ $uzsakymas->data }}" />
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="other">
                            Papildoma
                        </label>
                        <textarea name="papildoma" class="input-style" id="other" placeholder="Enter any other details">{{ $uzsakymas->papildoma }}</textarea>
                    </div>

                    <div clas="container">
                        <livewire:darbuotojai :uzsakymas="$uzsakymas"/>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="button-style">
                        Atnaujinti
                    </button>
                </div>
                <div class="flex justify-center items-center">
                    <div class="bg-gray-200">
                        <livewire:darbuotoju-form :uzsakymas_id="$uzsakymas['id']" :uzsakymas_data="$uzsakymas['data']" />
                    </div>
                </div>

            </div>
    </form>
</x-layout>






</body>

</html>



{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel Livewire 9 Dynamically Add/Remove Input Fields - Tutsmake.com</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<!-- Styles -->
<style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
</head>

<body>
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="mt-5 col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 style="font-size: 19px;">Laravel Livewire 9 Dynamically Add/Remove Input Fields -
                        Tutsmake.com</h5>
                </div>
                <div class="card-body">
                    <livewire:darbuotoju-form :uzsakymas_id="$uzsakymas['id']" :uzsakymas_data="$uzsakymas['data']"/>
                </div>
            </div>
        </div>
    </div>
</div>
@livewireScripts
</body> --}}

{{-- </html> --}}
