<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    @include('components.head')
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <div>
        <div class="relative min-h-screen md:flex">

            <!-- mobile menu bar -->
            <div class="bg-gray-800 text-gray-100 flex justify-between md:hidden">
                <!-- logo -->
                <a href="#" class="block p-4 text-white font-bold">Better Dev</a>

                <!-- mobile menu button -->
                <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- sidebar -->
            <div
                class="sidebar bg-blue-800 text-blue-100 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">

                <!-- logo -->
                {{-- <span class="font-bold uppercase "> Welcome, {{auth()->user()->prisijungimoVardas}}</span> --}}
                <a href="#" class="text-white flex items-center space-x-2 px-4">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                    <span class="text-2xl font-extrabold">Better Dev</span>
                </a>

                <!-- nav -->
                <nav>
                    <a href="/pagrindinis"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        Pagrindinis
                    </a>
                    <a href="/uzsakymai"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        Užsakymai
                    </a>
                    <a href="/darbuotojai"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        Darbuotojai
                    </a>
                    <a href="/redaguoti"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        Vartotojas
                    </a>       
                    <a href="/logout"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <form action="/logout" class="inline" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-door-closed"></i>
                                Atsijungti
                            </button>
                        </form> 
                    </a>
                </nav>
            </div>

            <!-- content -->
            <div class="flex-1 p-2 text-2xl font-bold gray-100">
                
                {{$slot}}

                @livewire('livewire-ui-modal')
                @livewireScripts
                
            </div>

        </div>
        
    </div>
</body>
</html>