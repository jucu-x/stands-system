<x-layouts.base>
    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Lista completa de Stands</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Centro de
            visualización de todos los stands creados históricamente. </p>
        @if ($stands->isNotEmpty())
            <div class="flex mx-4 my-4 gap-4">
                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                        class="flex w-2.5 h-2.5 bg-yellow-400 rounded-full mr-1.5 flex-shrink-0"></span>Stands de tiempo
                    parcial</span>
                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                        class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span>Stands full
                    time</span>
            </div>

            <x-stands.table :stands="$stands" />
        @else
            <p>No hay stands creados. Seleccione un <a class="underline" href="{{ route('expos.index') }}">evento</a> para
                poblarlo de stands</p>
        @endif
    </div>
</x-layouts.base>
