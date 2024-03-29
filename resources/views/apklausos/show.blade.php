<x-layout>
    <div class="mx-auto py-4 flex justify-center">
        <div class="mx-auto lg:w-7/12 gap-4 shadow">
            <div
                class="flex flex-col rounded shadow px-6 pt-4 text-center sm:text-left divide-y divide-gray-200 border-solid border-2 border-gray-300">
                <h1 class="font-bold bg-gray-200 py-2 px-2 mt-6 border-b-2 border-gray-500">Apklausa
                    {{ $apklausa->uzsakymai->vieta }}{{ '/' }}{{ $apklausa->uzsakymai->sventestipas }}{{ ', ' }}{{ $apklausa->uzsakymai->data }}
                </h1>
                <div class="">
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="virsvalandziai">
                            Viršvalandžiai:
                        </label>
                        <h3 class="text-lg">{{ $apklausa->virsvalandziai }}</h3>
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="inline-block text-lg" for="islaidos">
                            Išlaidos:
                        </label>
                        <h3 class="text-lg">{{ $apklausa->islaidos }}</h3>
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="kuras">
                            Kuras:
                        </label>
                        <h3 class="text-lg">{{ $apklausa->kuras }}</h3>
                    </div>
                    <div class="bg-gray-200 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="gedimai">
                            Gedimai:
                        </label>
                        <h3 class="text-lg">{{ $apklausa->gedimai }}</h3>
                    </div>
                    <div class="bg-gray-50 flex flex-col md:flex-row md:items-center p-2 gap-2">
                        <label class="text-3xl inline-block text-lg" for="komentarai">
                            Komentarai:
                        </label>
                        <h3 class="text-lg">{{ $apklausa->komentarai }}</h3>
                    </div>
                    <input name="filled" value=1 hidden />
                </div>





                <div class="flex flex-col items-center md:flex-row p-4 gap-2">
                    <a href="/apklausos" class="text-blue-400 rounded-xl">
                        <button type="button"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold h-10 px-5 rounded">
                            Grįžti
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
