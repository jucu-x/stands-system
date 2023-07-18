<x-layouts.base>
    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Stands FITECTUR</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Elige uno de
            los stands disponibles para nuestro próximo evento. <span href="#"
                class="font-semibold text-gray-900 underline dark:text-white decoration-blue-500 decoration-double">Sé
                parte de este nuevo destino junto a nosotros</span>
        </p>

        @if ($stands?->isNotEmpty())
            @foreach ($stands as $stand)
                @if ($stand->partial_time)
                    <button type="button"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">{{ $stand->code }}</button>
                @else
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ $stand->code }}</button>
                @endif
            @endforeach
        @else
            <div class="max-w-4xl mx-auto">
                <x-atomic.alert>No hay stands disponibles actualmente,
                    @if ($selected_expo)
                        vuelve en un par de horas.
                    @else
                        espera por nuestro próximo encuentro.
                    @endif
                </x-atomic.alert>
            </div>
        @endif
    </div>
</x-layouts.base>
