<x-layouts.base>
    <div class="title align-middle text-center pb-6 mb-6">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            @if ($current_expo)
                Stands {{ $current_expo->name }}
        </h1>
    @else
        Estamos preparando tu stand
        @endif
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Elige uno de
            los stands disponibles para nuestro próximo evento. <span href="#"
                class="font-semibold text-gray-900 underline dark:text-white decoration-blue-500 decoration-double">Sé
                parte de este nuevo destino junto a nosotros</span>
        </p>

        @if ($stands?->isNotEmpty())
            <img src="/plano.png" class="max-w-3xl mx-auto mb-5" alt="plano de stands FITECTUR">
            <div class="flex mx-4 my-4 gap-4 justify-center">
                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                        class="flex w-2.5 h-2.5 bg-yellow-400 rounded-full mr-1.5 flex-shrink-0"></span>Stands de tiempo
                    parcial</span>
                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                        class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span>Stands full
                    time</span>
            </div>
            <div class="flex flex-row flex-wrap max-w-4xl mx-auto gap-3 items-center justify-center">
                @foreach ($stands as $stand)
                    <a href="{{ route('anon-stands-requests.create', $stand) }}"
                        @if ($stand->partial_time) class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                    @else class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" @endif>
                        {{ $stand->code }}</a>
                @endforeach
            </div>
        @else
            <div class="max-w-4xl mx-auto">
                <x-atomic.alert>No hay stands disponibles actualmente,
                    @if ($current_expo)
                        Vuelve en un par de horas.
                    @else
                        Espera por nuestro próximo encuentro.
                    @endif
                </x-atomic.alert>
            </div>
        @endif
    </div>
</x-layouts.base>
