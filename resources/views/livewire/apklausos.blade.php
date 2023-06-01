<div class="p-5 h-screen bg-gray-100">
    <div class="flex flex-col items-center p-4">
        <h1 class="text-xl mb-2 ">Apklausos</h1>
        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-2 w-1/3 rounded mb-4 text-base text-xl text-center">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">

        @foreach ($apklausos as $apklausa)
            <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                <div class="flex items-center space-x-2 text-sm">
                    <div>
                        <a href="/apklausos/{{ $apklausa->id }}"
                            class="text-blue-500 font-bold hover:underline">#{{ $apklausa['id'] }}</a>
                    </div>
                    <div class="text-gray-500">{{ $apklausa['data'] }}</div>
                    <div>
                        <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Užpildyta</span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">
                    {{ $apklausa->uzsakymai->vieta }} {{ '/' }} {{ $apklausa->uzsakymai->sventestipas }}
                </div>
            </div>
        @endforeach
    </div>
    <div class="rounded-lg shadow hidden md:block xl:mx-60">
        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Numeris.</th>
                    <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Data</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Pavadinimas</th>
                    <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Statusas</th>

                    <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Užpildę</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">

                @foreach ($apklausos as $apklausa)
                    @if (Auth::user()->hasRole('Administratorius'))
                        @if ($apklausa->filled == '1')
                            <tr class="bg-white">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="/apklausos/{{ $apklausa->id }}"
                                        class="font-bold text-blue-500 hover:underline">#{{ $apklausa['id'] }}</a>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $apklausa->uzsakymai->data }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    Apklausa {{ $apklausa->uzsakymai->vieta }} {{ '/' }}
                                    {{ $apklausa->uzsakymai->sventestipas }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Užpildyta</span>
                                </td>
                                <td class="flex gap-x-2 p-3 text-sm text-gray-700 whitespace-nowrap">
                                    {{$apklausa->uzsakymai->darbuotojai->where('id', $apklausa->darbuotojas_id)->first()->vardas}}
                                    {{$apklausa->uzsakymai->darbuotojai->where('id', $apklausa->darbuotojas_id)->first()->pavarde}}
                                </td>
                            </tr>
                        @endif
                    @else
                        @if($apklausa->darbuotojas_id == Auth::user()->id)
                        <tr class="bg-white">
                            @if ($apklausa->filled == '1')
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="/apklausos/{{ $apklausa->id }}"
                                    class="font-bold text-blue-500 hover:underline">#{{ $apklausa['id'] }}</a>
                            </td>
                            @else
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="/apklausos/{{ $apklausa->id }}/pildyti"
                                    class="font-bold text-blue-500 hover:underline">#{{ $apklausa['id'] }}</a>
                            </td>
                            @endif
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $apklausa->uzsakymai->data }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                Apklausa {{ $apklausa->uzsakymai->vieta }} {{ '/' }}
                                {{ $apklausa->uzsakymai->sventestipas }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                @if ($apklausa->filled == '1')
                                    <span
                                        class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">UŽpildyta</span>
                                @elseif($apklausa->filled == '0')
                                    <span
                                        class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 bold rounded-lg bg-opacity-50 ">NeuŽpildyta</span>
                                @endif
                            </td>
                            <td class="flex gap-x-2 p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{$apklausa->uzsakymai->darbuotojai->where('id', $apklausa->darbuotojas_id)->first()->vardas}}
                                {{$apklausa->uzsakymai->darbuotojai->where('id', $apklausa->darbuotojas_id)->first()->pavarde}}
                            </td>
                        </tr>
                        @endif
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>
    <div class='p-5 flex flex-col items-center justify-center'>
        <div class="pt-4">
            {{ $apklausos->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@livewireScripts
